<?php

if (!function_exists("println")) {
    if (PHP_VERSION_ID >= 50600) {
        eval('
            function println(...$strings) {
                foreach ($strings as $string) {
                    print $string;

                    if (PHP_SAPI !== "cli") {
                        print "<br>";
                    }

                    print PHP_EOL;
                }
            }
        ');
    } else {
        /**
         * Prints each argument into a separate line.
         *
         * @param string $strings,... Strings to print
         */
        function println() {
            $strings = func_get_args();

            foreach ($strings as $string) {
                print $string;

                if (PHP_SAPI !== "cli") {
                    print "<br>";
                }

                print PHP_EOL;
            }
        }
    }
}
