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
      // ✅ Add buttons extension
      dom: '<"top flex flex-wrap items-center justify-between mb-2 gap-2 lg:ml-1"Bfl>rt<"bottom flex flex-wrap items-center justify-between mt-2 gap-2"ip>',
        buttons: {
          dom: {
            button: {
              className: '' // remove default 'btn' classes
            }
          },
          buttons: [
            {
              extend: 'copy',
              text: '<i class="ri-file-copy-2-fill"></i>',
              className: 'bg-green-500 text-white px-2 py-0.5 rounded-sm hover:bg-green-600 transition cursor-pointer',
              titleAttr: 'Copy to clipboard'
            },
            {
              extend: 'excel',
              text: '<i class="ri-file-excel-2-fill"></i>',
              className: 'bg-blue-500 text-white px-2 py-0.5 rounded hover:bg-blue-600 transition cursor-pointer'
            },
            {
              extend: 'csv',
              text: '<i class="fas fa-file-csv"></i>',
              className: 'bg-yellow-500 text-white px-2 py-0.5 rounded hover:bg-yellow-600 transition cursor-pointer'
            },
            {
              extend: 'pdf',
              text: '<i class="ri-file-pdf-2-fill"></i>',
              className: 'bg-orange-500 text-white px-2 py-0.5 rounded hover:bg-red-600 transition cursor-pointer'
            },
            {
              extend: 'print',
              text: '<i class="ri-printer-fill"></i>',
              className: 'bg-purple-500 text-white px-2 py-0.5 rounded hover:bg-purple-600 transition cursor-pointer'
            }
          ]
        },
      language: {
        search: "",
        searchPlaceholder: "Search",
        lengthMenu: "Show _MENU_ entries",
        paginate: {
          previous: '<button class="px-2 py-1 bg-green-700 text-white rounded hover:bg-green-800 transition cursor-pointer">&laquo;</button>',
          next: '<button class="px-2 py-1 bg-green-700 text-white rounded hover:bg-green-800 transition cursor-pointer">&raquo;</button>'
        }
      },
      initComplete: function () {
        const wrapper = $(this).closest('.dataTables_wrapper');
        const filter = wrapper.find('.dataTables_filter');
        const length = wrapper.find('.dataTables_length');
        const info = wrapper.find('.dataTables_info');
        const paginate = wrapper.find('.dataTables_paginate');

        const customTopBar = $('<div class="flex flex-wrap items-center justify-between mb-2 gap-2"></div>');
        customTopBar.append(length);
        customTopBar.append(filter);

        const customBottomBar = $('<div class="flex flex-wrap items-center justify-between gap-2"></div>');
        customBottomBar.append(info);
        customBottomBar.append(paginate);

        wrapper.find('> .row').first().remove();
        wrapper.prepend(customTopBar);
        wrapper.append(customBottomBar);

        info.addClass('text-[13px] text-green-800');
      }
    });
});

// For write lenght phone
const phoneInput = document.getElementById('phone');
phoneInput.addEventListener('input', (e) => {
  e.target.value = formatPhone(e.target.value);
});

  const formatPhone = (val) => {
    // Change slice(0, 9) to slice(0, 10) for 10-digit numbers
    const digits = val.replace(/\D/g, '').slice(0, 10); 
    const match = digits.match(/^(\d{0,3})(\d{0,3})(\d{0,4})$/);
    if (!match) return digits;
    return [match[1], match[2], match[3]].filter(Boolean).join('-');
  };
}

// Javascript for Editor Quill
const quill = new Quill('#editor', {
  modules: {
      toolbar: [
          [{ 'font': [] }],
          [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
          [{ 'size': ['small', false, 'large', 'huge'] }],
          ['bold', 'italic', 'underline', 'strike'],
          [{ 'color': [] }, { 'background': [] }],
          [{ 'script': 'sub'}, { 'script': 'super' }],
          ['blockquote', 'code-block'],
          [{ 'list': 'ordered'}, { 'list': 'bullet' }],
          [{ 'indent': '-1'}, { 'indent': '+1' }],
          [{ 'align': [] }],
          ['link', 'image', 'video', 'formula'],
          ['clean']
      ]
  },
  theme: 'snow',
  placeholder: 'Compose your content here...'
});

// Javascript for Editor Quill 1
const quill1 = new Quill('#editor1', {
  modules: {
      toolbar: [
          [{ 'font': [] }],
          [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
          [{ 'size': ['small', false, 'large', 'huge'] }],
          ['bold', 'italic', 'underline', 'strike'],
          [{ 'color': [] }, { 'background': [] }],
          [{ 'script': 'sub'}, { 'script': 'super' }],
          ['blockquote', 'code-block'],
          [{ 'list': 'ordered'}, { 'list': 'bullet' }],
          [{ 'indent': '-1'}, { 'indent': '+1' }],
          [{ 'align': [] }],
          ['link', 'image', 'video', 'formula'],
          ['clean']
      ]
  },
  theme: 'snow',
  placeholder: 'Compose your content here...'
});

/**
 * Sets up a preview for a user's profile image upload.
 * @param {string} inputId - The ID of the file input.
 * @param {string} previewId - The ID of the image element for the preview.
 */
function setupImagePreview(inputId, previewId) {
    const fileInput = document.getElementById(inputId);
    const previewImage = document.getElementById(previewId);

    if (fileInput && previewImage) {
        fileInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('empty-image');
                };
                reader.readAsDataURL(file);
            }
        });
    }
}

function UploadImage(inputId, previewId, iconId, errorId) {
  const imgInput = document.getElementById(inputId);
  const imgPreview = document.getElementById(previewId);
  const uploadIcon = document.getElementById(iconId);
  const errorMsg = document.getElementById(errorId);

  const MAX_SIZE_MB = 10;
  const MAX_SIZE_BYTES = MAX_SIZE_MB * 1024 * 1024; // 10MB in bytes

  // Helper to reset the UI state for this specific image section
  const resetUI = () => {
      imgPreview.src = '#';
      imgPreview.classList.add('hidden');
      uploadIcon.classList.remove('hidden');
      errorMsg && errorMsg.classList.add('hidden'); // Hide error if it exists
  };

  if (imgInput) { // Ensure the input element exists before attaching event listener
      imgInput.addEventListener('change', (e) => {
          const file = e.target.files[0];

          if (!file) { // No file selected (e.g., user canceled)
              resetUI();
              return;
          }

          // Validate file size
          if (file.size > MAX_SIZE_BYTES) {
              e.target.value = ''; // Clear the input field to allow re-selection of the same file
              resetUI();
              if (errorMsg) {
                  errorMsg.textContent = `File size exceeds ${MAX_SIZE_MB}MB.`;
                  errorMsg.classList.remove('hidden');
              }
              return; // Stop processing
          }

          // If size is valid, hide any previous error
          errorMsg && errorMsg.classList.add('hidden');

          // Read and display the image
          const reader = new FileReader();
          reader.onload = (event) => {
              imgPreview.src = event.target.result;
              imgPreview.classList.remove('hidden');
              uploadIcon.classList.add('hidden');
          };
          reader.readAsDataURL(file);
      });
  }
}

// Set up passwordtoggle user porfile in form
function PswToggleProfile(inputId, toggleIconId) {
    const passwordInput = document.getElementById(inputId);
    const toggleIcon = document.getElementById(toggleIconId);

    if (passwordInput && toggleIcon) {
        toggleIcon.addEventListener('click', function () {
            // Toggle the type attribute
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Toggle the eye icon classes
            this.classList.toggle('ri-eye-fill');
            this.classList.toggle('ri-eye-off-fill');
        });
    } else {
        console.warn(`Could not find elements for inputId: ${inputId} or toggleIconId: ${toggleIconId}`);
    }
}
// set up function for calcultate after discount product