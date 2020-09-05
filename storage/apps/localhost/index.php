{#
    # MacBB Forum Engine v1.0.1
    #
    # Created by Jonathan Irhodia(), Olaide Daniel,
    # Released: 
    # LICENSE: Double (GNU and MIT)
    # file: app/index.php
#}

{# This isnt required as it is defined in blocks each time by default #}
{% set Mac = BB.obj('Mac') %}

{% set branch = 'core/' ~ ( BB.base() | replace({'.php': '.twig'})) %}

{# Check-in To MacBB Branch, Optionally define which branch #}
{# Controlled Patty Check in

# {% if Mac.branch() %}
#    {% include branch %}
#    {% include 'core/terminate.twig' ignore missing %}
# {% endif %}

# Return back to this Filesystem if the branch Filesystem was opened
# {% do Mac.burst() %}
#}

{# Simple Patty Check in #}
{% do Mac.branch(branch) %}