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
            { extend: 'copy', text: '<i class="ri-file-copy-2-fill"></i>', className: 'btn-database bg-green-500 hover:bg-green-600', titleAttr: 'Copy to clipboard' },
            { extend: 'excel', text: '<i class="ri-file-excel-2-fill"></i>', className: 'btn-database bg-blue-500 rounded hover:bg-blue-600' },
            { extend: 'csv', text: '<i class="ri-file-text-fill"></i>', className: 'btn-database bg-yellow-500 hover:bg-yellow-600' },
            { extend: 'pdf', text: '<i class="ri-file-pdf-2-fill"></i>', className: 'btn-database bg-orange-500 hover:bg-red-600' },
            { extend: 'print', text: '<i class="ri-printer-fill"></i>', className: 'btn-database bg-purple-500 hover:bg-purple-600' }
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
  const phoneInput = document.getElementById('Phone');
  phoneInput.addEventListener('input', (e) => {
    e.target.value = formatPhone(e.target.value);
  });
  
  const formatPhone = (val) => {
    // Change slice(0, 9) to slice(0, 10) for 10-digit numbers
    const digits = val.replace(/\D/g, '').slice(0, 10); 
    const match = digits.match(/^(\d{0,3})(\d{0,3})(\d{0,4})$/);
    if (!match) return digits;
    return [match[1], match[2], match[3]].filter(Boolean).join('-');
  }
};

// Javascript for Editor Quill
// --- Global Quill Configuration (Do this only once) ---
// 1. Import the modules you want to customize
const size = Quill.import('attributors/style/size');
const Font = Quill.import('attributors/class/font'); // You were missing this line

// 2. Add your custom values to the whitelist
size.whitelist = ['small', false, 'large', 'huge', '14px'];
Font.whitelist = ['sans-serif', 'serif', 'monospace', 'battambang'];

// 3. Register BOTH customized modules
Quill.register(size, true);
Quill.register(Font, true); // You were missing this line


// --- Initialize your editors ---

// Initialize the first editor
const quill = new Quill('#editor', {
  modules: {
    toolbar: [
      [{ 'font': ['sans-serif', 'serif', 'monospace', 'battambang'] }],
      [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
      [{ 'size': ['small', false, 'large', 'huge', '14px'] }],
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

// Initialize the second editor
const quill1 = new Quill('#editor1', {
  modules: {
    toolbar: [
      [{ 'font': ['sans-serif', 'serif', 'monospace', 'battambang'] }],
      [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
      [{ 'size': ['small', false, 'large', 'huge', '14px'] }],
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

    // Get the delete button's container. This needs to be dynamic.
    const deleteButtonContainer = document.getElementById(`delete-button-${inputId.split('_').pop()}`);

    const MAX_SIZE_MB = 10;
    const MAX_SIZE_BYTES = MAX_SIZE_MB * 1024 * 1024;

    const resetUI = () => {
        imgPreview.src = '#';
        imgPreview.classList.add('hidden');
        uploadIcon.classList.remove('hidden');
        errorMsg && errorMsg.classList.add('hidden');
        deleteButtonContainer && deleteButtonContainer.classList.add('hidden');
    };

    if (imgInput) {
        imgInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (!file) {
                resetUI();
                return;
            }

            if (file.size > MAX_SIZE_BYTES) {
                e.target.value = '';
                resetUI();
                if (errorMsg) {
                    errorMsg.textContent = `File size exceeds ${MAX_SIZE_MB}MB.`;
                    errorMsg.classList.remove('hidden');
                }
                return;
            }

            errorMsg && errorMsg.classList.add('hidden');

            const reader = new FileReader();
            reader.onload = (event) => {
                imgPreview.src = event.target.result;
                imgPreview.classList.remove('hidden');
                uploadIcon.classList.add('hidden');

                // This is the key line: remove the 'hidden' class to show the button
                deleteButtonContainer && deleteButtonContainer.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        });
    }
}


function removeImage(imageIndex) {
    // ... (existing code to find and manipulate elements) ...
    const fileInput = document.getElementById(`img_url_${imageIndex}`);
    const clearInput = document.getElementById(`img_url_${imageIndex}_clear`); // New: Get the hidden input

    if (fileInput) fileInput.value = ''; // Clear the file input
    
    // New: Set the hidden input value to '1' to signal deletion
    if (clearInput) clearInput.value = '1';

    // ... (existing code to hide the preview and show the icon) ...
    const previewImage = document.getElementById(`preview-image-${imageIndex}`);
    const uploadIcon = document.getElementById(`upload-icon-${imageIndex}`);
    const deleteButtonContainer = document.getElementById(`delete-button-${imageIndex}`);

    if (previewImage) {
        previewImage.classList.add('hidden');
        previewImage.src = '#';
    }
    if (uploadIcon) uploadIcon.classList.remove('hidden');
    if (deleteButtonContainer) deleteButtonContainer.classList.add('hidden');
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
