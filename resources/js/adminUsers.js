document.addEventListener("DOMContentLoaded", () => {
    const openCreateBtn = document.getElementById("open-create-form");
    const cancelCreateBtn = document.getElementById("cancel-create");
    const createForm = document.getElementById("create-responsable-form");

    const modifyUserBtn = document.querySelectorAll(".modify-user-btn");
    const cancelModifyUserBtn = document.getElementById("cancel-modify-user");
    const modifyUserForm = document.getElementById("modify-user-form");

    const modifyRespBtn = document.querySelectorAll(".modify-responsable-btn");
    const cancelModifyRespBtn = document.getElementById(
        "cancel-modify-responsable",
    );
    const modifyRespForm = document.getElementById("modify-responsable-div");

    const allCards = document.querySelectorAll(".card:not(.form-card)");

    /* ================= CREATE RESPONSABLE ================= */
    if (openCreateBtn) {
        openCreateBtn.addEventListener("click", () => {
            allCards.forEach((card) => card.classList.add("hidden"));
            createForm.classList.remove("hidden");
        });
    }

    if (cancelCreateBtn) {
        cancelCreateBtn.addEventListener("click", () => {
            allCards.forEach((card) => card.classList.remove("hidden"));
            createForm.classList.add("hidden");
        });
    }

    /* ================= MODIFY USER ================= */
    modifyUserBtn.forEach((btn) => {
        btn.addEventListener("click", () => {
            allCards.forEach((card) => card.classList.add("hidden"));
            modifyUserForm.classList.remove("hidden");
        });
    });

    if (cancelModifyUserBtn) {
        cancelModifyUserBtn.addEventListener("click", () => {
            allCards.forEach((card) => card.classList.remove("hidden"));
            modifyUserForm.classList.add("hidden");
        });
    }

    /* ================= MODIFY RESPONSABLE ================= */
    modifyRespBtn.forEach((btn) => {
        btn.addEventListener("click", () => {
            allCards.forEach((card) => card.classList.add("hidden"));
            modifyRespForm.classList.remove("hidden");

            const id = btn.dataset.id;
            const name = btn.dataset.name;
            const email = btn.dataset.email;
            const category = btn.dataset.category;
            const type = btn.dataset.type;

            const div = document.getElementById("modify-responsable-div");
            div.querySelector("h2").textContent = `Modifier ${name}`;
            div.querySelector("h3").textContent = `Email: ${email}`;

            // Fill the inputs dynamically
            div.querySelector("select[name='type']").value = type;
            div.querySelector("select[name='category']").value = category;

            // form.querySelector("form").action = `/admin/users/modify/${id}`;
            document.getElementById("modify-responsable-form").action =
                btn.dataset.action;
        });
    });

    if (cancelModifyRespBtn) {
        cancelModifyRespBtn.addEventListener("click", () => {
            allCards.forEach((card) => card.classList.remove("hidden"));
            modifyRespForm.classList.add("hidden");
        });
    }

    /* ================= DELETE USER / RESPONSABLE (UI ONLY) ================= */
    document.querySelectorAll(".delete-btn").forEach((btn) => {
        btn.addEventListener("click", () => {
            const card = btn.closest(".user-card");

            if (!card) return;

            if (btn.classList.contains("blocked")) {
                // UNBLOCK (UI only)
                card.style.opacity = "1";
                btn.textContent = "Block";
                btn.classList.remove("blocked");
            } else {
                if (confirm("Are you sure you want to delete this account?")) {
                    card.style.opacity = "0.45";
                    btn.textContent = "Unblock";
                    btn.classList.add("blocked");
                }
            }
        });
    });

    /* ================= BLOCK USER / RESPONSABLE ================= */
    document.querySelectorAll(".block-btn").forEach((btn) => {
        const card = btn.closest(".user-card");
        if (!card) return;
        if (btn.textContent == "Block") {
            card.style.opacity = "1";
            btn.classList.remove("blocked");
        } else if (btn.textContent == "Unblock") {
            card.style.opacity = "0.45";
            btn.classList.add("blocked");
        }
    });

    /* ================= MODIFY RESPONSABLE (PLACEHOLDER) ================= */
    document.querySelectorAll(".modify-btn").forEach((btn) => {
        btn.addEventListener("click", () => {});
    });
});
