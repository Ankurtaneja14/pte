const expand_btn = document.querySelector(".expand-btn");
    let activeIndex;

    expand_btn.addEventListener("click", () => {
      document.body.classList.toggle("collapsed");
    });
    const dropdown = document.getElementById("dropdown")
    const avatar = document.getElementById("avatar")
    const current = window.location.href;
    avatar.addEventListener("mouseenter", ()=>{
      dropdown.classList.add("activate")
    })
    avatar.addEventListener("mouseleave", ()=>{
      dropdown.classList.remove("activate")
    })
    const allLinks = document.querySelectorAll(".sidebar-links a");

    allLinks.forEach((elem) => {
      elem.addEventListener('click', function () {
        const hrefLinkClick = elem.href;

        allLinks.forEach((link) => {
          if (link.href == hrefLinkClick) {
            link.classList.add("active");
          } else {
            link.classList.remove('active');
          }
        });
      })
    });
    