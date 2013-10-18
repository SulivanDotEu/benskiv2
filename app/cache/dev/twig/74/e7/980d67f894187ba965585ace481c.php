<?php

/* @WebProfiler/Profiler/base_js.html.twig */
class __TwigTemplate_74e7980d67f894187ba965585ace481c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<script>/*<![CDATA[*/
    Sfjs = (function() {
        \"use strict\";

        var noop = function() {},

            profilerStorageKey = 'sf2/profiler/',

            request = function(url, onSuccess, onError, payload, options) {
                var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                options = options || {};
                xhr.open(options.method || 'GET', url, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function(state) {
                    if (4 === xhr.readyState && 200 === xhr.status) {
                        (onSuccess || noop)(xhr);
                    } else if (4 === xhr.readyState && xhr.status != 200) {
                        (onError || noop)(xhr);
                    }
                };
                xhr.send(payload || '');
            },

            hasClass = function(el, klass) {
                return el.className.match(new RegExp('\\\\b' + klass + '\\\\b'));
            },

            removeClass = function(el, klass) {
                el.className = el.className.replace(new RegExp('\\\\b' + klass + '\\\\b'), ' ');
            },

            addClass = function(el, klass) {
                if (!hasClass(el, klass)) { el.className += \" \" + klass; }
            },

            getPreference = function(name) {
                if (!window.localStorage) {
                    return null;
                }

                return localStorage.getItem(profilerStorageKey + name);
            },

            setPreference = function(name, value) {
                if (!window.localStorage) {
                    return null;
                }

                localStorage.setItem(profilerStorageKey + name, value);
            };

        return {
            hasClass: hasClass,

            removeClass: removeClass,

            addClass: addClass,

            getPreference: getPreference,

            setPreference: setPreference,

            request: request,

            load: function(selector, url, onSuccess, onError, options) {
                var el = document.getElementById(selector);

                if (el && el.getAttribute('data-sfurl') !== url) {
                    request(
                        url,
                        function(xhr) {
                            el.innerHTML = xhr.responseText;
                            el.setAttribute('data-sfurl', url);
                            removeClass(el, 'loading');
                            (onSuccess || noop)(xhr, el);
                        },
                        function(xhr) { (onError || noop)(xhr, el); },
                        options
                    );
                }

                return this;
            },

            toggle: function(selector, elOn, elOff) {
                var i,
                    style,
                    tmp = elOn.style.display,
                    el = document.getElementById(selector);

                elOn.style.display = elOff.style.display;
                elOff.style.display = tmp;

                if (el) {
                    el.style.display = 'none' === tmp ? 'none' : 'block';
                }

                return this;
            }
        }
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/base_js.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  91 => 35,  83 => 30,  79 => 29,  75 => 28,  70 => 26,  62 => 24,  24 => 2,  60 => 18,  54 => 15,  51 => 14,  49 => 13,  36 => 8,  34 => 7,  29 => 5,  26 => 3,  22 => 3,  19 => 1,  269 => 129,  266 => 128,  264 => 127,  261 => 126,  257 => 114,  254 => 113,  250 => 108,  247 => 107,  241 => 99,  238 => 98,  231 => 109,  229 => 107,  222 => 102,  220 => 98,  214 => 94,  212 => 93,  209 => 92,  206 => 91,  201 => 115,  198 => 113,  196 => 91,  193 => 90,  186 => 71,  183 => 70,  177 => 20,  173 => 19,  169 => 18,  157 => 14,  151 => 131,  149 => 126,  138 => 117,  136 => 90,  127 => 83,  118 => 79,  113 => 75,  89 => 51,  85 => 50,  81 => 49,  69 => 40,  56 => 29,  48 => 16,  28 => 2,  61 => 17,  58 => 16,  46 => 14,  33 => 7,  30 => 5,  73 => 23,  67 => 19,  64 => 18,  57 => 14,  45 => 8,  42 => 12,  166 => 17,  163 => 16,  153 => 77,  146 => 72,  134 => 66,  129 => 64,  123 => 81,  119 => 60,  115 => 59,  111 => 70,  105 => 57,  99 => 56,  96 => 55,  92 => 54,  68 => 32,  66 => 25,  63 => 22,  53 => 19,  50 => 15,  43 => 14,  40 => 10,  35 => 4,  32 => 6,);
    }
}
