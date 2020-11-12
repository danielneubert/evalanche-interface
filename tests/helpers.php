<?php

/**
 * Returns a given PHP Unit value.
 *
 * @param  string  $name
 * @return mixed
 */
function getPhpUnitValue(string $name)
{
    return defined($name) ? constant($name) : null;
}
