!function() {
    "use strict";
    var e, t, n, a, o = localStorage.getItem("language"),
        s = "en";

    function l(e) {
        document.getElementById("header-lang-img") && ("en" == e ? document.getElementById("header-lang-img").src = "backend/images/flags/us.jpg" : "sp" == e ? document.getElementById("header-lang-img").src = "backend/images/flags/spain.jpg" : "gr" == e ? document.getElementById("header-lang-img").src = "backend/images/flags/germany.jpg" : "it" == e ? document.getElementById("header-lang-img").src = "backend/images/flags/italy.jpg" : "ru" == e && (document.getElementById("header-lang-img").src = "backend/images/flags/russia.jpg"), localStorage.setItem("language", e), o = localStorage.getItem("language"), function() {
            null == o && l(s);
            var e = new XMLHttpRequest;
            e.open("GET", "/backend/lang/" + o + ".json"), e.onreadystatechange = function() {
                var n;
                4 === this.readyState && 200 === this.status && (n = JSON.parse(this.responseText), Object.keys(n).forEach(function(t) {
                    document.querySelectorAll("[data-key='" + t + "']").forEach(function(e) {
                        e.textContent = n[t]
                    })
                }))
            }, e.send()
        }())
    }

    function i() {
        var e = document.querySelectorAll(".counter-value");
        e && e.forEach(function(o) {
            ! function e() {
                var t = +o.getAttribute("data-target"),
                    n = +o.innerText,
                    a = t / 250;
                a < 1 && (a = 1), n < t ? (o.innerText = (n + a).toFixed(0), setTimeout(e, 1)) : o.innerText = t
            }()
        })
    }

    function d() {
        setTimeout(function() {
            var e, t, n, a = document.getElementById("side-menu");
            a && (e = a.querySelector(".mm-active .active"), 300 < (t = e ? e.offsetTop : 0) && (t -= 100, (n = document.getElementsByClassName("vertical-menu") ? document.getElementsByClassName("vertical-menu")[0] : "") && n.querySelector(".simplebar-content-wrapper") && setTimeout(function() {
                n.querySelector(".simplebar-content-wrapper").scrollTop = t
            }, 0)))
        }, 0)
    }

    function r() {
        for (var e = document.getElementById("topnav-menu-content").getElementsByTagName("a"), t = 0, n = e.length; t < n; t++) "nav-item dropdown active" === e[t].parentElement.getAttribute("class") && (e[t].parentElement.classList.remove("active"), e[t].nextElementSibling.classList.remove("show"))
    }

    function c(e) {
        var t = document.getElementById(e);
        t.style.display = "block";
        var n = setInterval(function() {
            t.style.opacity || (t.style.opacity = 1), 0 < t.style.opacity ? t.style.opacity -= .2 : (clearInterval(n), t.style.display = "none")
        }, 200)
    }

    function u() {
        var e, t, n;
        feather.replace(), window.sessionStorage && ((e = sessionStorage.getItem("is_visited")) ? null !== (t = document.querySelector("#" + e)) && (t.checked = !0, n = e, 1 == document.getElementById("layout-direction-ltr").checked && "layout-direction-ltr" === n ? (document.getElementsByTagName("html")[0].removeAttribute("dir"), document.getElementById("layout-direction-rtl").checked = !1, document.getElementById("bootstrap-style").setAttribute("href", "backend/css/bootstrap.min.css"), document.getElementById("app-style").setAttribute("href", "backend/css/app.min.css"), sessionStorage.setItem("is_visited", "layout-direction-ltr")) : 1 == document.getElementById("layout-direction-rtl").checked && "layout-direction-rtl" === n && (document.getElementById("layout-direction-ltr").checked = !1, document.getElementById("bootstrap-style").setAttribute("href", "backend/css/bootstrap-rtl.min.css"), document.getElementById("app-style").setAttribute("href", "backend/css/app-rtl.min.css"), document.getElementsByTagName("html")[0].setAttribute("dir", "rtl"), sessionStorage.setItem("is_visited", "layout-direction-rtl"))) : sessionStorage.setItem("is_visited", "layout-direction-ltr"))
    }

    function m(e) {
        document.getElementById(e) && (document.getElementById(e).checked = !0)
    }

    function g() {
        document.webkitIsFullScreen || document.mozFullScreen || document.msFullscreenElement || document.body.classList.remove("fullscreen-enable")
    }

    document.addEventListener("DOMContentLoaded", function(e) {
        // Remove any preloader if it exists
        document.getElementById("preloader") && (c("pre-status"), c("preloader"));
    
        // u();
        
        document.getElementById("side-menu") && new MetisMenu("#side-menu");
        
        i();
    
        var t = document.body.getAttribute("data-sidebar-size");
        if (1024 <= window.innerWidth && window.innerWidth <= 1366) {
            document.body.setAttribute("data-sidebar-size", "sm");
            m("sidebar-size-small");
        }
    
        for (var e = document.getElementsByClassName("vertical-menu-btn"), n = 0; n < e.length; n++) {
            e[n] && e[n].addEventListener("click", function(e) {
                e.preventDefault();
                document.body.classList.toggle("sidebar-enable");
                if (992 <= window.innerWidth) {
                    if (null == t) {
                        if (null == document.body.getAttribute("data-sidebar-size") || "lg" == document.body.getAttribute("data-sidebar-size")) {
                            document.body.setAttribute("data-sidebar-size", "sm");
                        } else {
                            document.body.setAttribute("data-sidebar-size", "lg");
                        }
                    } else {
                        if ("md" == t) {
                            if ("md" == document.body.getAttribute("data-sidebar-size")) {
                                document.body.setAttribute("data-sidebar-size", "sm");
                            } else {
                                document.body.setAttribute("data-sidebar-size", "md");
                            }
                        } else {
                            if ("sm" == document.body.getAttribute("data-sidebar-size")) {
                                document.body.setAttribute("data-sidebar-size", "lg");
                            } else {
                                document.body.setAttribute("data-sidebar-size", "sm");
                            }
                        }
                    }
                } else {
                    d();
                }
            });
        }
    
        setTimeout(function() {
            var e = document.querySelectorAll("#sidebar-menu a");
            e && e.forEach(function(e) {
                var t, n, a, o, s, l = window.location.href.split(/[?#]/)[0];
                if (e.href == l) {
                    e.classList.add("active");
                    (t = e.parentElement) && "side-menu" !== t.id && (t.classList.add("mm-active"),
                    (n = t.parentElement) && "side-menu" !== n.id && (n.classList.add("mm-show"),
                    n.classList.contains("mm-collapsing") && console.log("has mm-collapsing"),
                    (a = n.parentElement) && "side-menu" !== a.id && (a.classList.add("mm-active"),
                    (o = a.parentElement) && "side-menu" !== o.id && (o.classList.add("mm-show"),
                    (s = o.parentElement) && "side-menu" !== s.id && s.classList.add("mm-active")))));
                }
            });
        }, 0);
    
        (e = document.querySelectorAll(".navbar-nav a")) && e.forEach(function(e) {
            var t, n, a, o, s, l, i = window.location.href.split(/[?#]/)[0];
            if (e.href == i) {
                e.classList.add("active");
                (t = e.parentElement) && (t.classList.add("active"),
                (n = t.parentElement).classList.add("active"),
                (a = n.parentElement) && (a.classList.add("active"),
                (o = a.parentElement).closest("li") && o.closest("li").classList.add("active"),
                o && (o.classList.add("active"),
                (s = o.parentElement) && (s.classList.add("active"),
                (l = s.parentElement) && l.classList.add("active")))));
            }
        });
    
        (t = document.querySelector('[data-toggle="fullscreen"]')) && t.addEventListener("click", function(e) {
            e.preventDefault();
            document.body.classList.toggle("fullscreen-enable");
            if (document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement) {
                if (document.cancelFullScreen) {
                    document.cancelFullScreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitCancelFullScreen) {
                    document.webkitCancelFullScreen();
                }
            } else {
                if (document.documentElement.requestFullscreen) {
                    document.documentElement.requestFullscreen();
                } else if (document.documentElement.mozRequestFullScreen) {
                    document.documentElement.mozRequestFullScreen();
                } else if (document.documentElement.webkitRequestFullscreen) {
                    document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                }
            }
        });
    
        document.addEventListener("fullscreenchange", g);
        document.addEventListener("webkitfullscreenchange", g);
        document.addEventListener("mozfullscreenchange", g);
    
        if (document.getElementById("topnav-menu-content")) {
            for (var e = document.getElementById("topnav-menu-content").getElementsByTagName("a"), t = 0, n = e.length; t < n; t++) {
                e[t].onclick = function(e) {
                    if ("#" === e.target.getAttribute("href")) {
                        e.target.parentElement.classList.toggle("active");
                        e.target.nextElementSibling.classList.toggle("show");
                    }
                };
            }
            window.addEventListener("resize", r);
        }
    
        [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function(e) {
            return new bootstrap.Tooltip(e);
        });
    
        [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')).map(function(e) {
            return new bootstrap.Popover(e);
        });
    
        [].slice.call(document.querySelectorAll(".toast")).map(function(e) {
            return new bootstrap.Toast(e);
        });
    
        if ("null" != o && o !== s) {
            l(o);
        }
    
        var e = document.getElementsByClassName("language");
        e && e.forEach(function(t) {
            t.addEventListener("click", function(e) {
                l(t.getAttribute("data-lang"));
            });
        });
    
        n = document.body;
        document.getElementById("right-bar-toggle").addEventListener("click", function(e) {
            n.classList.toggle("right-bar-enabled");
        });
    
        n.addEventListener("click", function(e) {
            if (!e.target.parentElement.classList.contains("right-bar-toggle-close") && e.target.closest(".right-bar-toggle, .right-bar")) {
                document.body.classList.remove("right-bar-enabled");
            }
        });
    
        n = document.getElementsByTagName("body")[0];
        if (n.hasAttribute("data-layout") && "horizontal" == n.getAttribute("data-layout")) {
            m("layout-horizontal");
            document.getElementById("sidebar-setting").style.display = "none";
        } else {
            m("layout-vertical");
        }
    
        if (n.hasAttribute("data-layout-mode") && "dark" == n.getAttribute("data-layout-mode")) {
            m("layout-mode-dark");
        } else {
            m("layout-mode-light");
        }
    
        if (n.hasAttribute("data-layout-size") && "boxed" == n.getAttribute("data-layout-size")) {
            m("layout-width-boxed");
        } else {
            m("layout-width-fluid");
        }
    
        if (n.hasAttribute("data-layout-scrollable") && "true" == n.getAttribute("data-layout-scrollable")) {
            m("layout-position-scrollable");
        } else {
            m("layout-position-fixed");
        }
    
        if (n.hasAttribute("data-topbar") && "dark" == n.getAttribute("data-topbar")) {
            m("topbar-color-dark");
        } else {
            m("topbar-color-light");
        }
    
        if (n.hasAttribute("data-sidebar-size") && "sm" == n.getAttribute("data-sidebar-size")) {
            m("sidebar-size-small");
        } else if (n.hasAttribute("data-sidebar-size") && "md" == n.getAttribute("data-sidebar-size")) {
            m("sidebar-size-compact");
        } else {
            m("sidebar-size-default");
        }
    
        if (n.hasAttribute("data-sidebar") && "brand" == n.getAttribute("data-sidebar")) {
            m("sidebar-color-brand");
        } else if (n.hasAttribute("data-sidebar") && "dark" == n.getAttribute("data-sidebar")) {
            m("sidebar-color-dark");
        } else {
            m("sidebar-color-light");
        }
    
        if (document.getElementsByTagName("html")[0].hasAttribute("dir") && "rtl" == document.getElementsByTagName("html")[0].getAttribute("dir")) {
            m("layout-direction-rtl");
        } else {
            m("layout-direction-ltr");
        }
    
        document.querySelectorAll("input[name='layout'").forEach(function(e) {
            e.addEventListener("change", function(e) {
                if (e && e.target && e.target.value) {
                    window.location.href = "vertical" == e.target.value ? "layout-vertical.html" : "index.html";
                }
            });
        });
    
        document.querySelectorAll("input[name='layout-mode']").forEach(function(e) {
            e.addEventListener("change", function(e) {
                if (e && e.target && e.target.value) {
                    if ("light" == e.target.value) {
                        document.body.setAttribute("data-layout-mode", "light");
                        document.body.setAttribute("data-topbar", "light");
                        document.body.setAttribute("data-sidebar", "light");
                        if (!n.hasAttribute("data-layout") || "horizontal" != n.getAttribute("data-layout")) {
                            document.body.setAttribute("data-sidebar", "light");
                        }
                        m("topbar-color-light");
                        m("sidebar-color-light");
                    } else {
                        document.body.setAttribute("data-layout-mode", "dark");
                        document.body.setAttribute("data-topbar", "dark");
                        document.body.setAttribute("data-sidebar", "dark");
                        if (!n.hasAttribute("data-layout") || "horizontal" != n.getAttribute("data-layout")) {
                            document.body.setAttribute("data-sidebar", "dark");
                        }
                        m("topbar-color-dark");
                        m("sidebar-color-dark");
                    }
                }
            });
        });
    
        document.querySelectorAll("input[name='layout-direction']").forEach(function(e) {
            e.addEventListener("change", function(e) {
                if (e && e.target && e.target.value) {
                    if ("ltr" == e.target.value) {
                        document.getElementsByTagName("html")[0].removeAttribute("dir");
                        document.getElementById("bootstrap-style").setAttribute("href", "backend/css/bootstrap.min.css");
                        document.getElementById("app-style").setAttribute("href", "backend/css/app.min.css");
                        sessionStorage.setItem("is_visited", "layout-direction-ltr");
                    } else {
                        document.getElementById("bootstrap-style").setAttribute("href", "backend/css/bootstrap-rtl.min.css");
                        document.getElementById("app-style").setAttribute("href", "backend/css/app-rtl.min.css");
                        document.getElementsByTagName("html")[0].setAttribute("dir", "rtl");
                        sessionStorage.setItem("is_visited", "layout-direction-rtl");
                    }
                }
            });
        });
    
        d();
    
        if (document.getElementById("horimenu-btn")) {
            document.getElementById("horimenu-btn").addEventListener("click", function() {
                document.body.classList.toggle("horimenu-enabled");
            });
    
            var e = document.getElementById("topnav-menu-content"),
                t = new bootstrap.Collapse(e, { toggle: !1 });
    
            document.querySelector(".hori-overlay").addEventListener("click", function() {
                t.hide();
                document.body.classList.remove("horimenu-enabled");
            });
    
            window.addEventListener("resize", function() {
                t.hide();
                if (window.innerWidth < 991) {
                    document.body.classList.remove("horimenu-enabled");
                }
            });
        }
    
        var n = document.getElementById("dash-troggle-icon"),
            a = !0,
            o = document.getElementById("dashtoggle"),
            s = new bootstrap.Collapse(o, { toggle: !1 });
    
        n.addEventListener("click", function() {
            a = !1;
            setTimeout(function() {
                a = !0;
            }, 500);
        });
    
        window.addEventListener("scroll", function() {
            if ((100 < document.documentElement.scrollTop || 0 == document.documentElement.scrollTop) && a) {
                if (20 < window.pageYOffset) {
                    s.hide();
                } else {
                    s.show();
                }
    
                if (window.innerWidth <= 992) {
                    a = !1;
                    setTimeout(function() {
                        a = !1;
                    }, 500);
                    s.hide();
                }
            }
        });
    
        if (a = document.getElementById("checkAll")) {
            a.onclick = function() {
                for (var e = document.querySelectorAll('.table-check input[type="checkbox"]'), t = 0; t < e.length; t++) {
                    e[t].checked = this.checked;
                }
            };
        }
    });
}();