<?php

/**
 * @copyright  Sebastian Weidemann 2020 <sama.zaphikel@gmail.com>
 * @author     Sebastian Weidemann
 * @package    FF Mor Aktion Tannenbaum
 * @license    MIT
 * @see        
 *
 */

/**
 * Backend modules
 */
$GLOBALS['BE_MOD']['aktion_tannenbaum']['members'] = array(
    'tables' => ['tl_tannenbaum_members']
);
$GLOBALS['BE_MOD']['aktion_tannenbaum']['streets'] = array(
    'tables' => ['tl_tannenbaum_streets']
);
/**
 * Models
 */
$GLOBALS['TL_MODELS']['tl_tannenbaum_members'] = \Sebastianweidemann\FfMorAktionTannenbaum\Model\TannenbaumMembersModel::class;

$GLOBALS['TL_MODELS']['tl_tannenbaum_streets'] = \Sebastianweidemann\FfMorAktionTannenbaum\Model\TannenbaumStreetsModel::class;

