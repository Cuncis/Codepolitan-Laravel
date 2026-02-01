namespace App\Views\Composers;

class MenuComposer
{
public function compose($view)
{
$menu = [
'Home' => '/',
'About' => '/about',
'Contact' => '/contact',
];

$authenticated = false;

if ($authenticated) {
$menu = array_merge($menu, [
'Dashboard' => '/admin/dashboard',
'Movies' => '/admin/movies',
'Users' => '/admin/users',
]);
} else {
$menu = [];
}

$view->with('menu', $menu);
}
}