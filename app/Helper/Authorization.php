<?

namespace Project\Helper;

class Authorization{
    public static function isAdmin()
    {
        return $result = $_SESSION["user"]->getType() == $_SESSION["user"]::ADMIN_ROLE ? true : false;
    }
    public static function isModerator()
    {
        return $result = $_SESSION["user"]->getType() == $_SESSION["user"]::MODERATOR_ROLE ? true : false;
    }
    public static function isEditor()
    {
        return $result = $_SESSION["user"]->getType() == $_SESSION["user"]::EDITOR_ROLE ? true : false;
    }
    public static function isUser()
    {
        return $result = $_SESSION["user"]->getType() == $_SESSION["user"]::USER_ROLE ? true : false;
    }
}