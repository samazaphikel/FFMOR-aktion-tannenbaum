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
 * Table tl_tannenbaum_members
 */
$GLOBALS['TL_DCA']['tl_tannenbaum_members'] = [

    // Config
    'config'      => [
        'dataContainer'    => 'Table',
        'enableVersioning' => true,
        'sql'              => [
            'keys' => [
                'id' => 'primary'
            ]
        ],
    ],
    'edit'        => [
        'buttons_callback' => [
            ['tl_tannenbaum_members', 'buttonsCallback']
        ]
    ],
    'list'        => [
        'sorting'           => [
            'mode'        => 2,
            'fields'      => ['district'],
            'flag'        => 1,
            'panelLayout' => 'filter;sort,search,limit'
        ],
        'label'             => [
            'fields' => ['lastname','street','district','zone'],
            'format' => '%s',
			'showColumns' => true,
        ],
        'global_operations' => [
            'all' => [
                'label'      => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'       => 'act=select',
                'class'      => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"'
            ]
        ],
        'operations'        => [
            'edit'   => [
                'label' => &$GLOBALS['TL_LANG']['tl_sample_table']['edit'],
                'href'  => 'act=edit',
                'icon'  => 'edit.gif'
            ],
            'delete' => [
                'label'      => &$GLOBALS['TL_LANG']['tl_sample_table']['delete'],
                'href'       => 'act=delete',
                'icon'       => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
            ],
            'show'   => [
                'label'      => &$GLOBALS['TL_LANG']['tl_sample_table']['show'],
                'href'       => 'act=show',
                'icon'       => 'show.gif',
                'attributes' => 'style="margin-right:3px"'
            ],
        ]
    ],
    // Palettes
    'palettes'    => [
        //'__selector__' => ['addSubpalette'],
        //'default'      => '{first_legend},title,selectField,checkboxField,multitextField;{second_legend},addSubpalette'
		'default' => '{booking_date_legend},id,tstamp,user,created_at,status,edited,paid,source;{personal_legend},firstname,lastname;{address_legend:hide},street,housnumber,district,zone;{contact_legend},phone,email;{notes_legend},christmastrees,comment'
    
    ],
    // Subpalettes
	/**
    'subpalettes' => [
        'addSubpalette' => 'textareaField',
    ],
	*/
    // Fields
    'fields'      => [
        'id'             => [
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ],
        'tstamp'         => [
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ],
        'user'          => [
            'inputType' => 'text',
            'exclude'   => true,
            'search'    => true,
            'filter'    => true,
            'sorting'   => true,
            'flag'      => 1,
            'eval'      => ['mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],
        'created_at'          => [
            'sorting'   => true,
            'inputType' => 'text',
            'eval'      => ['rgxp' => 'datim', 'tl_class' => 'w50 wizard', 'readonly' => true],
            'sql'       => "varchar(10) NOT NULL default ''",
        ],
		'status'  => [
            'inputType' => 'select',
            'exclude'   => true,
            'search'    => false,
            'filter'    => false,
            'sorting'   => true,
            'reference' => $GLOBALS['TL_LANG']['tl_tannenbaum_members'],
            'options'   => ['created', 'printed',],
            'eval'      => ['includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
		'edited'  => [
            'exclude'   => true,
			'filter'    => true,
            'inputType' => 'checkbox',
            'eval'      => ['submitOnChange' => true, 'tl_class' => 'w50 clr'],
            'sql'       => "char(1) NOT NULL default ''"
        ],
        'firstname'          => [
            'inputType' => 'text',
            'exclude'   => true,
            'search'    => true,
            'filter'    => false,
            'sorting'   => false,
            'flag'      => 1,
            'eval'      => ['mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],
        'lastname'          => [
            'inputType' => 'text',
            'exclude'   => true,
            'search'    => true,
            'filter'    => true,
            'sorting'   => true,
            'flag'      => 1,
            'eval'      => ['mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],	
        'street'          => [
            'inputType' => 'text',
            'exclude'   => true,
            'search'    => true,
            'filter'    => false,
            'sorting'   => true,
            'flag'      => 1,
            'eval'      => ['mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],			
		'housnumber'          => [
            'inputType' => 'text',
            'exclude'   => true,
            'search'    => false,
            'filter'    => false,
            'sorting'   => true,
            'flag'      => 1,
            'eval'      => ['mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],
		'district'          => [
            'inputType' => 'text',
            'exclude'   => true,
            'search'    => true,
            'filter'    => true,
            'sorting'   => true,
            'flag'      => 1,
            'eval'      => ['maxlength' => 255, 'tl_class' => 'w50','readonly' => true],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],	
		'zone'          => [
            'inputType' => 'text',
            'exclude'   => true,
            'search'    => false,
            'filter'    => true,
            'sorting'   => true,
            'flag'      => 1,
            'eval'      => ['maxlength' => 255, 'tl_class' => 'w50','readonly' => true],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],	
		'comment'          => [
            'inputType' => 'text',
            'exclude'   => true,
            'search'    => false,
            'filter'    => false,
            'sorting'   => false,
            'flag'      => 1,
            'eval'      => ['mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],
		'phone'          => [
            'inputType' => 'text',
            'exclude'   => true,
            'search'    => true,
            'filter'    => false,
            'sorting'   => false,
            'flag'      => 1,
            'eval'      => ['mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],
		'email'          => [
            'inputType' => 'text',
            'exclude'   => true,
            'search'    => true,
            'filter'    => false,
            'sorting'   => false,
            'flag'      => 1,
            'eval'      => ['mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],
		 'paid'  => [
            'exclude'   => true,
            'inputType' => 'checkbox',
            'eval'      => ['submitOnChange' => true, 'tl_class' => 'w50 clr'],
            'sql'       => "char(1) NOT NULL default ''"
        ],
		'source'  => [
            'inputType' => 'select',
            'exclude'   => true,
            'search'    => false,
            'filter'    => false,
            'sorting'   => false,
            'reference' => $GLOBALS['TL_LANG']['tl_tannenbaum_members'],
            'options'   => ['phone', 'email', 'form', 'local', 'flyer', ],
            'eval'      => ['includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
		'christmastrees'          => [
            'inputType' => 'text',
            'exclude'   => true,
            'search'    => true,
            'filter'    => false,
            'sorting'   => false,
            'flag'      => 1,
            'eval'      => ['mandatory' => true, 'maxlength' => 2, 'tl_class' => 'w50'],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
		
		
		
		
		
		
    ]
];

/**
 * Class tl_tannenbaum_members
 */
class tl_tannenbaum_members extends Contao\Backend
{

    /**
     * @param $arrButtons
     * @param \Contao\DC_Table $dc
     * @return mixed
     */
    public function buttonsCallback($arrButtons, Contao\DC_Table $dc)
    {
        if (Contao\Input::get('act') === 'edit')
        {
            $arrButtons['customButton'] = '<button type="submit" name="customButton" id="customButton" class="tl_submit customButton" accesskey="x">' . $GLOBALS['TL_LANG']['tl_tannenbaum_members']['customButton'] . '</button>';
        }

        return $arrButtons;
    }
}
