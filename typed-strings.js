document.addEventListener("DOMContentLoaded", function () {
    var options = {
      strings: JSON.parse(document.getElementById('typed-strings').getAttribute('data-typed')).strings,
      typeSpeed: 50,
      backSpeed: 75,
      backDelay: 2000,
      startDelay: 2000,
      loop: true
    };

    new Typed('#typed-strings', options);
  });