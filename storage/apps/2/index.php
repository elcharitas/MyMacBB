{#
    # Mac Forum Engine v1.0.1
    #
    # Created by Jonathan Irhodia(), Olaide Daniel,
    # Released: 
    # LICENSE: Double (GNU and MIT)
    # file: app/index.php
#}

{# This isnt required as it is defined in blocks each time by default #}
{% set Mac = BB.obj('Mac') %}

{% set resourcePath = 'core/' ~ ( BB.base() | replace({'.php': '.twig'})) %}

{# Check-in To Mac Branch, Optionally define which branch #}

 {% if Mac.checkout() %}
    {% include "magbb.twig" %}
    {% include resourcePath %}
    {% include 'terminate.twig' ignore missing %}

    {# Return back to local Filesystem #}
    {% do Mac.burst() %}
 {% endif %}