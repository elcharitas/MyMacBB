{# Mac Branch Handler #}

{% set Mac = bb.obj('Mac', 'lang') %}

{% do Mac.checkout('magbb_' ~ Mac.branch) %}