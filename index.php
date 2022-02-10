<?php
require_once 'helpers.php';
$is_auth = rand(0, 1);

$user_name = 'Inna';

$posts = [
    ['heading' => 'Цитата',
        'content' => 'Мы в жизни любим только раз, а после ищем лишь похожих',
        'type' => 'post-quote',
        'user_name' => 'Лариса',
        'avatar' => 'userpic-larisa-small.jpg'
    ], ['heading' => 'Игра престолов',
        'content' => 'Не могу дождаться начала финального сезона своего любимого сериала!',
        'type' => 'post-text',
        'user_name' => 'Владик',
        'avatar' => 'userpic.jpg'
    ], ['heading' => 'Наконец, обработал фотки!',
        'content' => 'rock-medium.jpg',
        'type' => 'post-photo',
        'user_name' => 'Виктор',
        'avatar' => 'userpic-mark.jpg'
    ], ['heading' => 'Моя мечта',
        'content' => 'coast-medium.jpg',
        'type' => 'post-photo',
        'user_name' => 'Лариса',
        'avatar' => 'userpic-larisa-small.jpg'
    ], ['heading' => 'Лучшие курсы',
        'content' => 'www.htmlacademy.ru',
        'type' => 'post-link',
        'user_name' => 'Владик',
        'avatar' => 'userpic.jpg'
    ]
];

function cutText(string $text, int $length = 300)
{
    $textWords = explode(' ', $text);
    $newText = '';
    $i = 0;

    while (mb_strlen($newText) < $length && isset($textWords[$i])) {
        $newText .= $textWords[$i] . ' ';
        $i++;
    }
    if (count($textWords) > $i) {
        $newText .= '...' . '<a href="#" class="post-text__more-link">Читать далее</a>';
    }

    return $newText;
}

$title = 'readme: популярное';

$content_main = include_template('main.php', [
    'posts' => $posts

]);
$content_layout = include_template('layout.php', [
    'is_auth' => $is_auth,
    'title' => $title,
    'content' => $content_main
]);
print $content_layout;

?>
