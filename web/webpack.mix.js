const { mix } = require('laravel-mix');
const { env } = require('minimist')(process.argv.slice(2));

console.log(`Compilando site ${env.site}.....`)


/* do stuff with mix that's common to all sites, like maybe mix.options() */

// load site-specific config
if (env && env.site) {
    require(`${__dirname}/webpack.mix.${env.site}.js`);
} else {
    console.error('Site no encontrado');
}
