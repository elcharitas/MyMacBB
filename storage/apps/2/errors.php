{#
    # Mac Forum Engine v1.0.1
    #
    # Created by Jonathan Irhodia(), Olaide Daniel,
    # Released: 
    # LICENSE: MIT
    # file: app/index.php
#}

{# This isnt required as it is defined in blocks each time by default #}
{% set Mac = BB.obj('Mac') %}

 {% if Mac.checkout() %}
    {% include "magbb.twig" %}
    {{ Mac.template('404', {'title': 'Error: This page does not exist!'}) | raw }}
    {% include 'terminate.twig' ignore missing %}

    {# Return back to local Filesystem #}
    {% do Mac.burst() %}
 {% endif %}