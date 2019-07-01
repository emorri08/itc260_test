<?php


//keys for ellycodes.com
$siteKey = "6LdgPqsUAAAAAJUTMWe9lVvUhHiLCkjZvEKORrRD";
$secretKey = "6LdgPqsUAAAAAP9rkML80YggfnNSNB7nl8QyJ_j0";


////here we avoid date errors:
date_default_timezone_set('America/LosAngeles');


define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//echo and die --> in case further testing is needed:
//echo THIS_PAGE;
//die;

// ---------- SWITCH STATEMENT ----------

//switch(THIS_PAGE)
//{
//    case 'index.php':
//            $title = 'Main';
//            $icon = 'butterfly.png';
//            $head = 'Eleanor Boyd: WEB120 Portal';
//        break;
//        
//    case 'aia.php':
//            $title = 'AIA';
//            $icon = 'sun.png';
//            $head = 'Audience, Issues, &amp; Approach';
//        break;
//        
//    case 'stage.php':
//            $title = 'E. Boyd: Staging Area';
//            $icon = 'paw-icon.png';
//            $head = 'Eleanor Boyd: Staging Area';
//        break;
//        
//    case 'contactme.php':
//            $title = 'Contact Elly';
//            $icon = 'moon.png';
//            $head = 'Contact Elly';
//        break;
//        
//        default:
//            $title = THIS_PAGE;
//}

// ---------- END SWITCH STATEMENT ----------

// ---------- BEGIN NAV1 ----------

//$nav1['index.php'] = "Main/Home";
//$nav1['big/index.php'] = "Big";
//$nav1['aia.php'] = "AIA";
//$nav1['fp/index.php'] = "Final Project";
//$nav1['stage.php'] = "Staging Area";
//$nav1['contactme.php'] = "Contact Elly";

// ---------- END NAV1 ----------

// ---------- START makeLinks function ----------

//function makeLinks($nav){
//    $myReturn = '';
//    
//    foreach($nav as $page => $text)
//    {
//        
//        if(THIS_PAGE == $page)
//        {
//            $myReturn .= '
//            <li class="active">
//                <a href="' . $page . '">' . $text . '</a>
//            </li>
//            ';
//        }else{
//            $myReturn .='
//            <li>
//                <a href="' . $page . '">' . $text . '</a>
//            </li>
//            ';
//        }
//    }
//    
//  return $myReturn;    
//}

// ---------- END makeLinks function ----------