import * as Str from 'core/str';

const CONFIG = {
    number_of_quacks: 2,
    quack_text: 'Quack!',
};

export const init = async function(number_of_quacks = 2){
    CONFIG.number_of_quacks = number_of_quacks;

    const plugin_name = await Str.get_string('pluginname', 'tenantplugin_quacker')
    console.info(plugin_name);

    setInterval(function(){
        console.warn(CONFIG.quack_text.repeat(CONFIG.number_of_quacks));
    }, 5000);
}