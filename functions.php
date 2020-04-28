<?php

/**
 * Get the origin of the current URL.
 *
 * @param bool $use_forwarded_host [optional] Whether to use $_SERVER['HTTP_X_FORWARDED_HOST'] or not. Default 'false'.
 *
 * @return string The current URL origin.
 */
function getOrigin( bool $use_forwarded_host = false ) : string {
    $ssl = ( ! empty( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' );
    $sp = strtolower( $_SERVER['SERVER_PROTOCOL'] );
    $protocol = substr( $sp, 0, strpos( $sp, '/' ) ) . ( $ssl ? 's' : '' );
    $port = (string) $_SERVER['SERVER_PORT'];
    $port = ( ( ! $ssl && $port === '80' ) || ( $ssl && $port === '443' ) ) ? '' : ':' . $port;
    $host = ( $use_forwarded_host && isset( $_SERVER['HTTP_X_FORWARDED_HOST'] ) ) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : $_SERVER['HTTP_HOST'] ?? null ?? ( $_SERVER['SERVER_NAME'] . $port );
    return $protocol . '://' . $host;
}

/**
 * Get the full URL of the current page.
 *
 * @param bool $use_forwarded_host [optional] Whether to use $_SERVER['HTTP_X_FORWARDED_HOST'] or not. Default 'false'.
 *
 * @return string The full current URL.
 */
function getCurrentUrl( bool $use_forwarded_host = false ) : string {
    return getOrigin( $use_forwarded_host ) . $_SERVER['REQUEST_URI'];
}

/**
 * Turns a string into an URL-friendly slug.
 *
 * @param string $text The text to slugify.
 *
 * @return string The string as an URL-friendly slug.
 */
function slugify( $text ) {
    $text = preg_replace( '/ä/iu', 'ae', $text );
    $text = preg_replace( '/ö/iu', 'oe', $text );
    $text = preg_replace( '/ü/iu', 'ue', $text );
    $text = preg_replace( '~[^\pL\d]+~u', '-', $text );
    $text = iconv( 'utf-8', 'us-ascii//TRANSLIT', $text );
    $text = preg_replace( '~[^-\w]+~', '', $text );
    $text = trim( $text, '-' );
    $text = preg_replace( '~-+~', '-', $text );
    $text = strtolower( $text );
    if ( empty( $text ) ) {
        return 'n-a';
    }
    return $text;
}


/**
 * Creates the header of the page. Directly echoes it.
 *
 * @param string $title       The title of the page.
 * @param string $description The description of the page.
 * @param string $extra_head  Extra content to add to the end of the head tag.
 * @param string $extra_body  Extra content to add to the beginning of the body tag.
 */
function getHeader( $title, $description, $extra_head = '', $extra_body = '' ) {
    global $origin, $current, $site_title; ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, nofollow">
        <meta property="og:type" content="text/html" />
        <meta property="og:url" content="<?php echo $current; ?>" />
        <meta property="og:image" content="<?php echo $origin; ?>assets/MGH_Cropped-Thicker.png" />
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $origin; ?>assets/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $origin; ?>assets/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $origin; ?>assets/favicons/favicon-16x16.png">
        <link rel="manifest" href="<?php echo $origin; ?>assets/favicons/site.webmanifest">
        <link rel="shortcut icon" href="<?php echo $origin; ?>favicon.ico">
        <meta name="msapplication-TileColor" content="#DA532C">
        <meta name="msapplication-config" content="<?php echo $origin; ?>assets/favicons/browserconfig.xml">
        <meta name="theme-color" content="#A678DE">
        <link rel="stylesheet" href="<?php echo $origin; ?>fonts/web/index.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $origin; ?>css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $origin; ?>css/style.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $origin; ?>css/responsive.css" type="text/css" />
        <script type="application/javascript" src="<?php echo $origin; ?>js/jquery-3.5.0.min.js" defer></script>
        <script type="application/javascript" src="<?php echo $origin; ?>js/bootstrap.min.js" defer></script>
        <script type="application/javascript" src="<?php echo $origin; ?>js/confetti.min.js" defer></script>
        <script type="application/javascript" src="<?php echo $origin; ?>js/index.js" defer></script>
        <script async>document.documentElement.className += ' js';</script>
        <noscript>
            <style>
                .mode, nav ul li:nth-of-type(5) {
                    display: none;
                }
            </style>
        </noscript>
        <title><?php echo $title; ?> | <?php echo $site_title; ?></title>
        <meta property="title" content="<?php echo $title; ?> | <?php echo $site_title; ?>" />
        <meta property="description"
              content="<?php echo $description; ?>" />
        <meta property="og:title" content="<?php echo $title; ?> | <?php echo $site_title; ?>" />
        <meta property="og:description"
              content="<?php echo $description; ?>" />
        <?php echo $extra_head; ?>
    </head>
    <body class="<?php echo slugify( $title ); ?>">
    <?php echo $extra_body; ?>
    <header id="top">
        <div class="container header-content">
            <div class="row">
                <div class="col-12 col-md-3 logo-wrapper">
                    <img class="logo" src="assets/MGH_Cropped-Thicker.png" alt="Logo"
                         title="Unofficial Midnight Ghost Hunt Discord Moderation Guide" />
                </div>
                <div class="col-12 col-md-9 title-wrapper">
                    <h1 title="Unofficial Midnight Ghost Hunt Discord Moderation Guide">Unofficial Discord Moderation
                        Guide</h1>
                </div>
            </div>
            <div class="row">
                <nav class="col-12 menu" id="menu">
                    <ul>
                        <li>
                            <a href="<?php echo $origin; ?>" title="Home">Home</a>
                        </li>
                        <li>
                            <a href="<?php echo $origin; ?>modmail" title="Modmail">Modmail</a>
                        </li>
                        <li>
                            <a href="<?php echo $origin; ?>#rules" data-offset="100" title="Rules">Rules</a>
                        </li>
                        <li>
                            <a href="<?php echo $origin; ?>#commands" data-offset="100" title="Commands">Commands</a>
                        </li>
                        <li>
                            <a href="<?php echo $origin; ?>#actions" data-offset="100" title="Actions">Actions</a>
                        </li>
                        <li>
                            <a data-toggle="modal" data-target="#about" href="#" title="About">About</a>
                        </li>
                        <li class="external">
                            <a href="https://docs.google.com/document/d/1BF9JT1FSHRGi1O_DKYX8FfrJU2LcEvOkdrt5Gouvj6U/edit"
                               target="_blank" class="external" title="Official Moderation Guide">Official Moderation
                                Guide</a>
                        </li>
                        <li class="external">
                            <a href="https://docs.google.com/document/d/1S9kJFAnBHnxDAsTDaA4eHq9mfHpLTsJsuW3572or2Yw/edit"
                               target="_blank" class="external" title="Official Zeppelin Guide">Official Zeppelin
                                Guide</a>
                        </li>
                        <li>
                            <a class="top" href="#top" title="Back to top">
                                ↑
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="mode">
                    <div id="light" title="Enable Light Mode">
                        <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor"
                                  d="M256 160c-52.9 0-96 43.1-96 96s43.1 96 96 96 96-43.1 96-96-43.1-96-96-96zm246.4 80.5l-94.7-47.3 33.5-100.4c4.5-13.6-8.4-26.5-21.9-21.9l-100.4 33.5-47.4-94.8c-6.4-12.8-24.6-12.8-31 0l-47.3 94.7L92.7 70.8c-13.6-4.5-26.5 8.4-21.9 21.9l33.5 100.4-94.7 47.4c-12.8 6.4-12.8 24.6 0 31l94.7 47.3-33.5 100.5c-4.5 13.6 8.4 26.5 21.9 21.9l100.4-33.5 47.3 94.7c6.4 12.8 24.6 12.8 31 0l47.3-94.7 100.4 33.5c13.6 4.5 26.5-8.4 21.9-21.9l-33.5-100.4 94.7-47.3c13-6.5 13-24.7.2-31.1zm-155.9 106c-49.9 49.9-131.1 49.9-181 0-49.9-49.9-49.9-131.1 0-181 49.9-49.9 131.1-49.9 181 0 49.9 49.9 49.9 131.1 0 181z"
                                  class=""></path>
                        </svg>
                    </div>
                    <div id="dark" title="Enable Dark Mode">
                        <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor"
                                  d="M283.211 512c78.962 0 151.079-35.925 198.857-94.792 7.068-8.708-.639-21.43-11.562-19.35-124.203 23.654-238.262-71.576-238.262-196.954 0-72.222 38.662-138.635 101.498-174.394 9.686-5.512 7.25-20.197-3.756-22.23A258.156 258.156 0 0 0 283.211 0c-141.309 0-256 114.511-256 256 0 141.309 114.511 256 256 256z"
                                  class=""></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="content">
<?php }

/**
 * Creates the footer of the page. Directly echoes it.
 *
 * @param string $extra_body Extra content to add to the end of the body tag.
 */
function getFooter( $extra_body = '' ) { ?>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div>This website is not operated by or affiliated with Vaulted Sky Games or Discord Inc.</div>
                    <div>
                        Made with
                        <div class="d-inline" title="I love you">
                            <svg class="heart" focusable="false"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor"
                                      d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"></path>
                            </svg>
                        </div>
                        by <a href="https://fabio.gg/" target="_blank" title="@Fabio#1234 on Discord"
                              class="external">Fabio</a>
                    </div>
                    <div>Copyright &copy; 2020</div>
                </div>
            </div>
        </div>
    </footer>
    <div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="aboutLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="aboutLabel">About</h5>
                </div>
                <div class="modal-body">
                    <p>Welcome to the unofficial Midnight Ghost Hunt Discord Moderation Guide. This website aims to
                        provide
                        a simpler guide than the <a
                                href="https://docs.google.com/document/d/1BF9JT1FSHRGi1O_DKYX8FfrJU2LcEvOkdrt5Gouvj6U/edit"
                                target="_blank" class="external"
                                title="Official Midnight Ghost Hunt Discord Moderation Guide">official guide</a> (made
                        by
                        Poggers#0001 and Dark#1010), leaving out rules that are common sense and/or obvious. You should
                        find
                        only absolutely necessary information on this page. The information might be inaccurate or
                        out-of-date, so please use the <a
                                href="https://docs.google.com/document/d/1BF9JT1FSHRGi1O_DKYX8FfrJU2LcEvOkdrt5Gouvj6U/edit"
                                target="_blank" class="external"
                                title="Official Midnight Ghost Hunt Discord Moderation Guide">official guide</a> for a
                        full
                        and up-to-date guide.</p>
                </div>
            </div>
        </div>
    </div>
    <?php echo $extra_body; ?>
    </body>
    </html>
<?php }

global $origin, $current, $site_title;
$origin = rtrim( getOrigin(), '/' ) . '/'; // local dev: http://localhost:63342/mgh.fabio.gg/
$current = getCurrentUrl();
$site_title = 'Unofficial MGH Discord Moderation Guide';