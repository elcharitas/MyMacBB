{# MacBB Branch Handler #}

{% set Mac = bb.obj('Mac', 'lang') %}

{% do Mac.branch('magbb_' ~ Mac.branch) %}