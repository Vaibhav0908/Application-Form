const sections = {
    addMorefam: {
        group: "group-fam",
        container: "familyContainer",
        remove: "remove-fam",
    },
    addMorequa: {
        group: "group-qua",
        container: "qualificationContainer",
        remove: "remove-qua",
    },
    addmorepro: {
        group: "group-pro",
        container: "professionalContainer",
        remove: "remove-pro",
    },
};

Object.keys(sections).forEach((buttonId) => {
    document.getElementById(buttonId).addEventListener("click", function () {
        let config = sections[buttonId];

        let clone = document.querySelector("." + config.group).cloneNode(true);

        clone.querySelectorAll("input").forEach((input) => (input.value = ""));

        clone.querySelectorAll("select").forEach((select) => {
            select.selectedIndex = 0;
        });

        clone.insertAdjacentHTML(
            "beforeend",
            `
            <div class="col-12 text-end mb-3">
                <button type="button" 
                    class="btn btn-danger ${config.remove}">
                    <i class="fas fa-trash-alt"></i> Remove
                </button>
                <hr>
            </div>
        `,
        );

        document.getElementById(config.container).appendChild(clone);
    });
});

document.addEventListener("click", function (e) {
    let btn = e.target.closest(".remove-fam, .remove-qua, .remove-pro");

    if (btn) {
        btn.closest(".group-fam, .group-qua, .group-pro").remove();
    }
});

const menuToggle = document.getElementById("menuToggle");
const sidebar = document.getElementById("sidebar");
const sidebarOverlay = document.getElementById("sidebarOverlay");

menuToggle.addEventListener("click", function () {
    sidebar.classList.toggle("show");
    sidebarOverlay.classList.toggle("show");
});

sidebarOverlay.addEventListener("click", function () {
    sidebar.classList.remove("show");
    sidebarOverlay.classList.remove("show");
});
