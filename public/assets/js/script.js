// Toggle the visibility of a dropdown menu
const toggleDropdown = (dropdown, menu, isOpen) => {
  dropdown.classList.toggle("open", isOpen);
  menu.style.height = isOpen ? `${menu.scrollHeight}px` : 0;
};

// Close All Dropdown
const closeAllDropdowns = () => {
  document.querySelectorAll(".dropdown-container.open").forEach(openDropdown =>{
    toggleDropdown(openDropdown,openDropdown.querySelector(".dropdown-menu") ,false);
  });
}

// Attach click event to all dropdown toggles
document.querySelectorAll(".dropdown-toggle").forEach(dropdownToggle => {
  dropdownToggle.addEventListener("click", e => {
    e.preventDefault();

    const dropdown = e.target.closest(".dropdown-container");
    const menu = dropdown.querySelector(".dropdown-menu");
    const isOpen = dropdown.classList.contains("open");

    closeAllDropdowns(); // Close all open drodown

    toggleDropdown(dropdown, menu, !isOpen); // Toggle current dropdown
  });
});

// Attach click event to sidber toggle buttons
document.querySelectorAll(".sidebar-toggler, .sidebar-menu-button").forEach(button => {
  button.addEventListener("click", () => {
    closeAllDropdowns(); // Make sure this function exists and doesn't throw errors
    document.querySelector(".sidebar").classList.toggle("collapsed");
  });
});


// Collapse sidebar by default on smalll screens
if(window.innerWidth <= 1024 ) document.querySelector(".sidebar").classList.toggle("collapsed");

// Use for Dropdown Items
const userButton = document.getElementById('user-menu-button');
const dropdownMenu = document.getElementById('user-dropdown');
const caretIcon = userButton?.querySelector('.caret-icon');

userButton?.addEventListener('click', (e) => {
  e.stopPropagation();
  dropdownMenu.classList.toggle('scale-y-100');
  dropdownMenu.classList.toggle('opacity-100');
  dropdownMenu.classList.toggle('pointer-events-auto');
  dropdownMenu.classList.toggle('scale-y-0');
  dropdownMenu.classList.toggle('opacity-0');
  dropdownMenu.classList.toggle('pointer-events-none');
  caretIcon?.classList.toggle('rotate-180');
});

// document.addEventListener('click', (e) => {
//   if (!userButton?.contains(e.target) && !dropdownMenu?.contains(e.target)) {
//     dropdownMenu?.classList.remove('scale-y-100', 'opacity-100', 'pointer-events-auto');
//     dropdownMenu?.classList.add('scale-y-0', 'opacity-0', 'pointer-events-none');
//     caretIcon?.classList.remove('rotate-180');
//   }
// });

// For function add active .nav-link
function highlightActiveNavLink() {
  const navLinks = document.querySelectorAll('.nav-link');
  const currentUrl = window.location.href;

  navLinks.forEach(link => {
    if (link.href === currentUrl) {
      link.classList.add('active');
    }
  });
}

// For Customize table Filter Datatable Tailwind Css 4.1
function initializeTailwindDataTable(tableSelector) {
  $(tableSelector).each(function () {
    $(this).DataTable({
      pageLength: 5,
      lengthMenu: [5, 10, 25, 50],
      language: {
        search: "",
        searchPlaceholder: "Search",
        lengthMenu: "Show _MENU_ entries",
        paginate: {
          previous: '<button class="px-2 py-1 bg-blue-700 text-white rounded hover:bg-blue-800 transition cursor-pointer">&laquo;</button>',
          next: '<button class="px-2 py-1 bg-blue-700 text-white rounded hover:bg-blue-800 transition cursor-pointer">&raquo;</button>'
        }
      },
      initComplete: function () {
        const wrapper = $(this).closest('.dataTables_wrapper');
        const filter = wrapper.find('.dataTables_filter');
        const length = wrapper.find('.dataTables_length');
        const info = wrapper.find('.dataTables_info');
        const paginate = wrapper.find('.dataTables_paginate');

        const customTopBar = $('<div class="flex flex-wrap items-center justify-between mb-4 gap-2"></div>');
        customTopBar.append(length);
        customTopBar.append(filter);

        const customBottomBar = $('<div class="flex flex-wrap items-center justify-between mt-4 gap-2"></div>');
        customBottomBar.append(info);
        customBottomBar.append(paginate);

        wrapper.find('> .row').first().remove();
        wrapper.prepend(customTopBar);
        wrapper.append(customBottomBar);

        info.addClass('text-[13px] text-blue-800');
      }
    });
  });

// For write lenght phone
const phoneInput = document.getElementById('phone');
phoneInput.addEventListener('input', (e) => {
  e.target.value = formatPhone(e.target.value);
});

  const formatPhone = (val) => {
    const digits = val.replace(/\D/g, '').slice(0, 9);
    const match = digits.match(/^(\d{0,3})(\d{0,3})(\d{0,3})$/);
    if (!match) return digits;
    return [match[1], match[2], match[3]].filter(Boolean).join('-');
  };
}

// This For style input description editor
const quill = new Quill('#editor', {
  modules: {
    syntax: true,
    toolbar: '#toolbar-container',
  },
  placeholder: 'Compose an epic...',
  theme: 'snow',
});