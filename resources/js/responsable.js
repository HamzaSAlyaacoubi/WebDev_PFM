// new code
// code for switch between resources tables with buttons list
const resourcesMenuItems = document.querySelectorAll(".resources-menu li");
const resourcesSections = document.querySelectorAll(".resource-table");

resourcesMenuItems.forEach((item) => {
    item.addEventListener("click", () => {
        // Remove active class from all menu items
        resourcesMenuItems.forEach((i) =>
            i.classList.remove("active-resource"),
        );
        // Add active to clicked item
        item.classList.add("active-resource");

        // Hide all sections
        resourcesSections.forEach((section) =>
            section.classList.remove("active"),
        );
        // Show targeted section
        const target = item.getAttribute("data-target");
        document.getElementById(target).classList.add("active");
    });
});

//
const modifyBtns = document.querySelectorAll(".modify-btn");
const modifyForm = document.querySelectorAll(".modify-form");

modifyBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        // hide all tables & forms
        document
            .querySelectorAll(".resource-table, .modify-form")
            .forEach((el) => el.classList.add("hidden"));

        // show correct form
        const target = btn.dataset.target;
        document.getElementById(target).classList.add("active");

        // SERVER FORM FILL
        if (target === "modify-server") {
            document.getElementById("server-id").value = btn.dataset.id;
            document.getElementById("server-name").value = btn.dataset.name;
            document.getElementById("server-brand").value = btn.dataset.brand;
            document.getElementById("server-cpu").value = btn.dataset.cpu;
            document.getElementById("server-ram").value = btn.dataset.ram;
            document.getElementById("server-storage").value =
                btn.dataset.storage;
            document.getElementById("server-storage-type").value =
                btn.dataset.storage_type;
            document.getElementById("server-os").value = btn.dataset.os;
            document.getElementById("server-location").value =
                btn.dataset.location;
            document.getElementById("server-status").value = btn.dataset.status;
            document.getElementById("server-quantity").value =
                btn.dataset.quantity;
            document.getElementById("server-description").value =
                btn.dataset.description;

            document.getElementById("modify-server-form").action =
                btn.dataset.action;
        }

        // ================= VM =================
        if (btn.dataset.target === "modify-vm") {
            document.getElementById("vm-id").value = btn.dataset.id;
            document.getElementById("vm-name").value = btn.dataset.name;
            document.getElementById("vm-cpu").value = btn.dataset.cpu;
            document.getElementById("vm-ram").value = btn.dataset.ram;
            document.getElementById("vm-storage").value = btn.dataset.storage;
            document.getElementById("vm-storage-type").value =
                btn.dataset.storage_type;
            document.getElementById("vm-os").value = btn.dataset.os;
            document.getElementById("vm-ip").value = btn.dataset.ip;
            document.getElementById("vm-server").value = btn.dataset.server;
            document.getElementById("vm-status").value = btn.dataset.status;
            document.getElementById("vm-quantity").value = btn.dataset.quantity;
            document.getElementById("vm-description").value =
                btn.dataset.description;

            document.getElementById("modify-vm-form").action =
                btn.dataset.action;
        }

        // ================= NETWORK =================
        if (btn.dataset.target === "modify-network") {
            document.getElementById("network-id").value = btn.dataset.id;
            document.getElementById("network-name").value = btn.dataset.name;
            document.getElementById("network-brand").value = btn.dataset.brand;
            document.getElementById("network-type").value = btn.dataset.type;
            document.getElementById("network-model").value = btn.dataset.model;
            document.getElementById("network-port").value = btn.dataset.port;
            document.getElementById("network-speed").value = btn.dataset.speed;
            document.getElementById("network-status").value =
                btn.dataset.status;
            document.getElementById("network-quantity").value =
                btn.dataset.quantity;
            document.getElementById("network-description").value =
                btn.dataset.description;

            document.getElementById("modify-network-form").action =
                btn.dataset.action;
        }

        // ================= STORAGE =================
        if (btn.dataset.target === "modify-storage") {
            document.getElementById("storage-id").value = btn.dataset.id;
            document.getElementById("storage-name").value = btn.dataset.name;
            document.getElementById("storage-brand").value = btn.dataset.brand;
            document.getElementById("storage-capacity").value =
                btn.dataset.capacity;
            document.getElementById("storage-type").value = btn.dataset.type;
            document.getElementById("storage-speed").value = btn.dataset.speed;
            document.getElementById("storage-status").value =
                btn.dataset.status;
            document.getElementById("storage-quantity").value =
                btn.dataset.quantity;
            document.getElementById("storage-description").value =
                btn.dataset.description;

            document.getElementById("modify-storage-form").action =
                btn.dataset.action;
        }
    });
});

const searchInput = document.getElementById("search-input");

let debounceTimer;

searchInput.addEventListener("keyup", function () {
    clearTimeout(debounceTimer);

    debounceTimer = setTimeout(() => {
        const query = searchInput.value;
        const activeTab = document.querySelector(
            ".resources-menu .active-resource",
        );
        const type = activeTab.dataset.target;

        fetch(`/responsable/search?search=${query}&type=${type}`)
            .then((res) => res.json())
            .then((data) => updateTable(type, data));
    }, 300);
});

function updateTable(type, data) {
    const tbody = document.getElementById(`${type}-body`);
    tbody.innerHTML = "";

    if (data.length === 0) {
        tbody.innerHTML = `<tr><td colspan="12">No results</td></tr>`;
        return;
    }

    data.forEach((item) => {
        tbody.innerHTML += `
            <tr>
                <td>${item.name}</td>
                <td>${item.brand ?? "-"}</td>
                <td>${item.cpu ?? "-"}</td>
                <td>${item.ram ?? "-"}</td>
                <td>${item.storage ?? "-"}</td>
                <td>${item.status ?? "-"}</td>
                <td>${item.quantity_available ?? "-"}</td>
                <td>${item.description ?? "-"}</td>
            </tr>
        `;
    });
}

// for Cancel button in modify form
const cancelBtns = document.querySelectorAll(".cancel-btn");

cancelBtns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
        e.preventDefault();

        document
            .querySelector(".modify-form.active")
            ?.classList.remove("active");

        document
            .querySelector(".resource-table.hidden")
            ?.classList.remove("hidden");
    });
});
