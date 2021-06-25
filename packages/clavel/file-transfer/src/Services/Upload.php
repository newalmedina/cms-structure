<?php
namespace Clavel\FileTransfer\Services;

use Exception;
use Illuminate\Support\Facades\Storage;

class Upload
{
    public static function generateFilePath(string $token)
    {
        if (strlen($token) < 5) {
            throw new Exception('Invalid token');
        }
        $path = 'files/';
        for ($i = 0; $i < 3; $i++) {
            $letter = substr($token, $i, 1);
            $path .= $letter.'/';
        }
        return rtrim($path, '/');
    }

    public static function getMetadata(string $bundle_id)
    {
        // Making sure the metadata file exists
        if (! Storage::disk('local')->exists('bundles/'.$bundle_id.'.json')) {
            return false;
        }
        // Getting metadata file contents
        $metadata = Storage::disk('local')->get('bundles/'.$bundle_id.'.json');
        // Json decoding the metadata
        if ($json = json_decode($metadata, true)) {
            return $json;
        }
        return false;
    }

    public static function humanFilesize($size, $precision = 2)
    {
        if ($size > 0) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');
            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        } else {
            return $size;
        }
    }

    public static function fileMaxSize($human = false)
    {
        $values = [
            'post'      => ini_get('post_max_size'),
            'upload'    => ini_get('upload_max_filesize'),
            'memory'    => ini_get('memory_limit'),
            'config'    => config('file-transfer.max_filesize')
        ];
        foreach ($values as $k => $v) {
            $unit = preg_replace('/[^bkmgtpezy]/i', '', $v);
            $size = preg_replace('/[^0-9\.]/', '', $v);
            if ($unit) {
                // Find the position of the unit in the ordered string which is
                // the power of magnitude to multiply a kilobyte by.
                $values[$k] = round($size * pow(1024, stripos('bkmgtpezy', $unit[0])));
            }
        }
        $min = min($values);
        if ($human === true) {
            return self::humanFilesize($min);
        }
        return $min;
    }


    public static function canUpload($current_ip)
    {
        // Getting the IP limit configuration
        $ips = config('file-transfer.upload_ip_limit');
        if (empty($ips)) {
            return true;
        }
        $ips = explode(',', $ips);
        // If set and not empty, checking client's IP
        if (! empty($ips) && count($ips) > 0) {
            $valid      = false;
            foreach ($ips as $ip) {
                $ip = trim($ip);
                // Client's IP appears in the whitelist
                if (self::isValidIp($current_ip, $ip)) {
                    $valid = true;
                    break;
                }
            }
            // Client's IP is not allowed
            if ($valid === false) {
                return false;
            }
        }
        return true;
    }

    public static function isValidIp($ip, $range)
    {
        // Range is in CIDR format
        if (strpos($range, '/') !== false) {
            list($range, $netmask) = explode('/', $range, 2);
            // Netmask is a 255.255.0.0 format
            if (strpos($netmask, '.') !== false) {
                $netmask = str_replace('*', '0', $netmask);
                $netmask_dec = ip2long($netmask);
                return ((ip2long($ip) & $netmask_dec) == (ip2long($range) & $netmask_dec));
            } else {
                // Netmask is a CIDR size block
                // fix the range argument
                $x = explode('.', $range);
                while (count($x) < 4) {
                    $x[] = 0;
                }
                list($a, $b, $c, $d) = $x;
                $range = sprintf("%u.%u.%u.%u", empty($a)?'0':$a, empty($b)?'0':$b, empty($c)?'0':$c, empty($d)?'0':$d);
                $range_dec = ip2long($range);
                $ip_dec = ip2long($ip);
                $wildcard_dec = pow(2, (32-$netmask)) - 1;
                $netmask_dec = ~ $wildcard_dec;
                return (($ip_dec & $netmask_dec) == ($range_dec & $netmask_dec));
            }
        } elseif (strpos($range, '*') !== false || strpos($range, '-') !== false) {
            // Range might be 255.255.*.* or 1.2.3.0-1.2.3.255
            // a.b.*.* format
            if (strpos($range, '*') !== false) {
                // Just convert to A-B format by setting * to 0 for A and 255 for B
                $lower = str_replace('*', '0', $range);
                $upper = str_replace('*', '255', $range);
                $range = "$lower-$upper";
            }
            // A-B format
            if (strpos($range, '-') !== false) {
                list($lower, $upper) = explode('-', $range, 2);
                $lower_dec = (float)sprintf("%u", ip2long($lower));
                $upper_dec = (float)sprintf("%u", ip2long($upper));
                $ip_dec = (float)sprintf("%u", ip2long($ip));
                return (($ip_dec >= $lower_dec) && ($ip_dec <= $upper_dec));
            }
            return false;
        }

        // Full IP format 192.168.10.10
        return ($ip == $range);
    }
}
