<?php

/*
 * System:      IPS (Immigration Permit System)
 * Version:     1.0.0
 * Authors:     ANDREA, Robert       2009-04-00299
 *              TEMAELI, Daudi       2009-04-05113
 *              MARCEL, Joseph:      2009-04-02676
 *              MDEGELA, Jaqlini     2009-04-02957
 *              CHAHE, Karington     2009-04-00595
 *
 * Copyright 2012 ANDREA Robert  : TEMAELI Daudi
 *                MARCEL Joseph  : MDEGELA, Jaqlini
 *                CHAHE Karington, all rights reserved.
 */

function human_filesize($bytes, $decimals = 2) {
    $sz = 'BKMGTP';
    $factor = floor((strlen($bytes) - 1) / 3);
    if (@$sz[$factor] == 'B'){
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
    }  else {
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor]. 'B';
    }
}

?>
