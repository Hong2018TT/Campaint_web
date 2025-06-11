const spinner = function () {
    setTimeout(function () {
      const el = document.getElementById('spinner');
      if (el) {
        el.classList.add('hide');
      }
    }, 200);
  };
spinner();