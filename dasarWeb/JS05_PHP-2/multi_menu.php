<?php
$menu = [
    [
        "nama" => "Beranda"
    ],
    [
        "nama" => "Berita",
        "subMenus" => [
            [
                "nama" => "Wisata",
                "subMenus" => [
                    [
                        "nama" => "Pantai"
                    ],
                    [
                        "nama" => "Gunung"
                    ]
                ]
            ],
            [
                "nama" => "Kuliner"
            ],
            [
                "nama" => "Hiburan"
            ]
        ]
    ],
    [
        "nama" => "Tentang"
    ],
    [
        "nama" => "Kontak"
    ]
];
function tampilkanMenuBertingkat(array $menu) {
    echo "<ul>"; 
    foreach ($menu as $item) {
        echo "<li>{$item['nama']}";
    
        if (isset($item['subMenus'])) {
            tampilkanMenuBertingkat($item['subMenus']);
        }
        echo "</li>";
    }
    echo "</ul>";
}

tampilkanMenuBertingkat($menu);
?>