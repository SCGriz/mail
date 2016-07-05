<?php
  class oAuthService {
    private static $clientId = "405d8376-d265-4b98-af00-41b03ce8d797";
    private static $clientSecret = "GhQvOhNt1MXCFe2gYDNdn1u";
    private static $authority = "https://login.microsoftonline.com";
    private static $authorizeUrl = '/common/oauth2/v2.0/authorize?client_id=%1$s&redirect_uri=%2$s&response_type=code&scope=%3$s';
    private static $tokenUrl = "/common/oauth2/v2.0/token";

    // The app only needs openid (for user's ID info), and Mail.Read
    private static $scopes = array("openid",
                                   "https://outlook.office.com/mail.read");

    public static function getLoginUrl($redirectUri) {
      // Build scope string. Multiple scopes are separated
      // by a space
      $scopestr = implode(" ", self::$scopes);

      $loginUrl = self::$authority.sprintf(self::$authorizeUrl, self::$clientId, urlencode($redirectUri), urlencode($scopestr));

      error_log("Generated login URL: ".$loginUrl);
      return $loginUrl;
    }
  }
?>
