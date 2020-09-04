{# MagBB Branch Handler #}

{% set Mag = bb.obj('Mag', 'lang') %}

{% do Mag.branch('magbb_' ~ Mag.branch) %}