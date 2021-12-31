<?php

/**
 * Fetch General Settings set for whole site
 */
function createSlug($title, $b_model, $fieldname, $id = 0)
{

    // Normalize the title
    $slug = Str::slug($title, '-');

    // Get any that could possibly be related.
    // This cuts the queries down by doing it once.
    $allSlugs = getRelatedSlugs($slug, $b_model, $fieldname, $id);


    // If we haven't used it before then we are all good.
    if (!$allSlugs->contains('slug', $slug)) {
        return $slug;
    }

    // Just append numbers like a savage until we find not used.
    for ($i = 1; $i <= 10; $i++) {
        $newSlug = $slug . '-' . $i;
        if (!$allSlugs->contains('slug', $newSlug)) {
            return $newSlug;
        }
    }


}

function getRelatedSlugs($slug, $b_model, $fieldname, $id = 0)
{

    $models = 'App\\Models\\' . $b_model;

    $ss = $models::select($fieldname)->where($fieldname, 'like', $slug . '%')
        ->where('id', '<>', $id)
        ->get();

    return $ss;
}


function getFieldValue($model, $fieldname, $value, $name)
{
    $models = 'App\\Models\\' . $model;
    $res = $models::where($fieldname, $value)->first();
    if (!is_null($res)) {
        return $res->$name;
    }

    return '--';

}

function getAuctionItemImage($limit = 0, $id)
{
    if ($limit > 0) {
        $auction_images = \App\Models\AuctionImage::where('auction_id', $id)->where('auction_image_cat', 'auction_item')->orderBy('id', 'desc')->take($limit)->get('image_name');


    } else {
        $auction_images = \App\Models\AuctionImage::where('auction_id', $id)->where('auction_image_cat', 'auction_item')->orderBy('id', 'desc')->get('image_name');
    }
    return $auction_images;
}

function getTruncatedCCNumber($ccNum)
{
    return str_replace(range(0, 9), "*", substr($ccNum, 0, -4)) . substr($ccNum, -4);
}

function getCCImage($type)
{
    $array = array(
        'American Express' => 'https://bidera.hibid.com/Styles/images/icons/cc-amex.png',
        'Visa' => 'https://bidera.hibid.com/Styles/images/icons/cc-visa.png',
        'Mastercard' => 'https://bidera.hibid.com/Styles/images/icons/cc-mastercard.png',
        'Discover' => 'https://bidera.hibid.com/Styles/images/icons/cc-discover.png'
    );
    return $array[$type];
}

function fetchAuctionImage($id)
{
    $auction_images = \App\Models\AuctionImage::where('auction_id', $id)->where('auction_image_cat', 'auction')->orderBy('id', 'desc')->take(1)->get('image_name');
    return $auction_images;
}

function fetchItemsCategories($auction_id)
{


    $query = 'select categories.title, categories.id, count(auction_items.id) as item_count  from auction_items inner join categories on auction_items.categoryid = categories.id where auction_items.auctionid="' . $auction_id . '" group by auction_items.categoryid';
    $res = DB::select($query);
    return $res;
}

function fetchCatById($cat_id)
{


    $query = 'select title from categories where  id="' . $cat_id . '"';
    $res = DB::select($query);
    if (count($res) > 0) {
        return $res[0]->title;
    }
    return '';
}

function fetchAllItemsCategories()
{


    $query = 'select categories.title, categories.id, count(auction_items.id) as item_count  from auction_items inner join categories on auction_items.categoryid = categories.id group by auction_items.categoryid';
    $res = DB::select($query);
    return $res;
}

function imageResize($imageSrc, $imageWidth, $imageHeight, $newImageWidth, $newImageHeight)
{


    $newImageLayer = imagecreatetruecolor($newImageWidth, $newImageHeight);
    imagecopyresampled($newImageLayer, $imageSrc, 0, 0, 0, 0, $newImageWidth, $newImageHeight, $imageWidth, $imageHeight);

    return $newImageLayer;
}

function getSellerDetailBySellerID($seller_id)
{
    $seller_details = \App\Models\Seller::where('seller_id', $seller_id)->get();
    return $seller_details;
}

function itemCount($auction_id)
{
    $query = \App\Models\AuctionItems::where('auctionid', $auction_id);
    $auction_items = $query->count();
    return $auction_items;
}

function getSiteSetting()
{
    $data = \App\Models\SiteSetting::all();
    $res = array();
    foreach ($data as $d) {
        $res[$d->meta_key] = $d->meta_value;
    }

    return $res;
}

function getLanguages()
{
    $codes = [
        'ab' => 'Abkhazian',
        'aa' => 'Afar',
        'af' => 'Afrikaans',
        'ak' => 'Akan',
        'sq' => 'Albanian',
        'am' => 'Amharic',
        'ar' => 'Arabic',
        'an' => 'Aragonese',
        'hy' => 'Armenian',
        'as' => 'Assamese',
        'av' => 'Avaric',
        'ae' => 'Avestan',
        'ay' => 'Aymara',
        'az' => 'Azerbaijani',
        'bm' => 'Bambara',
        'ba' => 'Bashkir',
        'eu' => 'Basque',
        'be' => 'Belarusian',
        'bn' => 'Bengali',
        'bh' => 'Bihari languages',
        'bi' => 'Bislama',
        'bs' => 'Bosnian',
        'br' => 'Breton',
        'bg' => 'Bulgarian',
        'my' => 'Burmese',
        'ca' => 'Catalan, Valencian',
        'km' => 'Central Khmer',
        'ch' => 'Chamorro',
        'ce' => 'Chechen',
        'ny' => 'Chichewa, Chewa, Nyanja',
        'zh' => 'Chinese',
        'cu' => 'Church Slavonic, Old Bulgarian, Old Church Slavonic',
        'cv' => 'Chuvash',
        'kw' => 'Cornish',
        'co' => 'Corsican',
        'cr' => 'Cree',
        'hr' => 'Croatian',
        'cs' => 'Czech',
        'da' => 'Danish',
        'dv' => 'Divehi, Dhivehi, Maldivian',
        'nl' => 'Dutch, Flemish',
        'dz' => 'Dzongkha',
        'en' => 'English',
        'eo' => 'Esperanto',
        'et' => 'Estonian',
        'ee' => 'Ewe',
        'fo' => 'Faroese',
        'fj' => 'Fijian',
        'fi' => 'Finnish',
        'fr' => 'French',
        'ff' => 'Fulah',
        'gd' => 'Gaelic, Scottish Gaelic',
        'gl' => 'Galician',
        'lg' => 'Ganda',
        'ka' => 'Georgian',
        'de' => 'German',
        'ki' => 'Gikuyu, Kikuyu',
        'el' => 'Greek (Modern)',
        'kl' => 'Greenlandic, Kalaallisut',
        'gn' => 'Guarani',
        'gu' => 'Gujarati',
        'ht' => 'Haitian, Haitian Creole',
        'ha' => 'Hausa',
        'he' => 'Hebrew',
        'hz' => 'Herero',
        'hi' => 'Hindi',
        'ho' => 'Hiri Motu',
        'hu' => 'Hungarian',
        'is' => 'Icelandic',
        'io' => 'Ido',
        'ig' => 'Igbo',
        'id' => 'Indonesian',
        'ia' => 'Interlingua (International Auxiliary Language Association)',
        'ie' => 'Interlingue',
        'iu' => 'Inuktitut',
        'ik' => 'Inupiaq',
        'ga' => 'Irish',
        'it' => 'Italian',
        'ja' => 'Japanese',
        'jv' => 'Javanese',
        'kn' => 'Kannada',
        'kr' => 'Kanuri',
        'ks' => 'Kashmiri',
        'kk' => 'Kazakh',
        'rw' => 'Kinyarwanda',
        'kv' => 'Komi',
        'kg' => 'Kongo',
        'ko' => 'Korean',
        'kj' => 'Kwanyama, Kuanyama',
        'ku' => 'Kurdish',
        'ky' => 'Kyrgyz',
        'lo' => 'Lao',
        'la' => 'Latin',
        'lv' => 'Latvian',
        'lb' => 'Letzeburgesch, Luxembourgish',
        'li' => 'Limburgish, Limburgan, Limburger',
        'ln' => 'Lingala',
        'lt' => 'Lithuanian',
        'lu' => 'Luba-Katanga',
        'mk' => 'Macedonian',
        'mg' => 'Malagasy',
        'ms' => 'Malay',
        'ml' => 'Malayalam',
        'mt' => 'Maltese',
        'gv' => 'Manx',
        'mi' => 'Maori',
        'mr' => 'Marathi',
        'mh' => 'Marshallese',
        'ro' => 'Moldovan, Moldavian, Romanian',
        'mn' => 'Mongolian',
        'na' => 'Nauru',
        'nv' => 'Navajo, Navaho',
        'nd' => 'Northern Ndebele',
        'ng' => 'Ndonga',
        'ne' => 'Nepali',
        'se' => 'Northern Sami',
        'no' => 'Norwegian',
        'nb' => 'Norwegian Bokmål',
        'nn' => 'Norwegian Nynorsk',
        'ii' => 'Nuosu, Sichuan Yi',
        'oc' => 'Occitan (post 1500)',
        'oj' => 'Ojibwa',
        'or' => 'Oriya',
        'om' => 'Oromo',
        'os' => 'Ossetian, Ossetic',
        'pi' => 'Pali',
        'pa' => 'Panjabi, Punjabi',
        'ps' => 'Pashto, Pushto',
        'fa' => 'Persian',
        'pl' => 'Polish',
        'pt' => 'Portuguese',
        'qu' => 'Quechua',
        'rm' => 'Romansh',
        'rn' => 'Rundi',
        'ru' => 'Russian',
        'sm' => 'Samoan',
        'sg' => 'Sango',
        'sa' => 'Sanskrit',
        'sc' => 'Sardinian',
        'sr' => 'Serbian',
        'sn' => 'Shona',
        'sd' => 'Sindhi',
        'si' => 'Sinhala, Sinhalese',
        'sk' => 'Slovak',
        'sl' => 'Slovenian',
        'so' => 'Somali',
        'st' => 'Sotho, Southern',
        'nr' => 'South Ndebele',
        'es' => 'Spanish, Castilian',
        'su' => 'Sundanese',
        'sw' => 'Swahili',
        'ss' => 'Swati',
        'sv' => 'Swedish',
        'tl' => 'Tagalog',
        'ty' => 'Tahitian',
        'tg' => 'Tajik',
        'ta' => 'Tamil',
        'tt' => 'Tatar',
        'te' => 'Telugu',
        'th' => 'Thai',
        'bo' => 'Tibetan',
        'ti' => 'Tigrinya',
        'to' => 'Tonga (Tonga Islands)',
        'ts' => 'Tsonga',
        'tn' => 'Tswana',
        'tr' => 'Turkish',
        'tk' => 'Turkmen',
        'tw' => 'Twi',
        'ug' => 'Uighur, Uyghur',
        'uk' => 'Ukrainian',
        'ur' => 'Urdu',
        'uz' => 'Uzbek',
        've' => 'Venda',
        'vi' => 'Vietnamese',
        'vo' => 'Volap_k',
        'wa' => 'Walloon',
        'cy' => 'Welsh',
        'fy' => 'Western Frisian',
        'wo' => 'Wolof',
        'xh' => 'Xhosa',
        'yi' => 'Yiddish',
        'yo' => 'Yoruba',
        'za' => 'Zhuang, Chuang',
        'zu' => 'Zulu'
    ];
    return $codes;
}

function cate_nav()
{

    return \App\Models\Category::all();

}

function profile_image()
{
    $profile = \App\Models\Profile::firstWhere('user_id',\Illuminate\Support\Facades\Auth::id());
    $data ='frontend/img/user.png';
    if ($profile && $profile->profile_photo) {$data = $profile->profile_photo;}
    return  asset($data);

}