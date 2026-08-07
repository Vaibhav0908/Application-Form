// document
//   .getElementById("candidateForm")
//   .addEventListener("submit", function (e) {
//     let name = document.getElementById("name").value;

//     let email = document.getElementById("email").value;

//     let mobile = document.getElementById("mobile").value;

//     if (name == "") {
//       alert("Please enter your name");
//       e.preventDefault();
//     } else if (email == "") {
//       alert("Please enter email");
//       e.preventDefault();
//     } else if (mobile.length != 10) {
//       alert("Enter valid mobile number");
//       e.preventDefault();
//     } else {
//       alert("Application submitted successfully");
//     }
//   });

// document.getElementById("addMorefam").addEventListener("click", function () {
//   let firstBlock = document.querySelector(".group-fam");
//   let clone = firstBlock.cloneNode(true);

//   clone.querySelectorAll("input").forEach((input) => {
//     input.value = "";
//   });

//   let removeBtn = document.createElement("div");
//   removeBtn.className = "col-12 text-end mb-3";
//   removeBtn.innerHTML = `<button type="button" class="btn btn-danger remove-fam"
//         style=" padding: 15px;
//         width: 120px;
//         border: none;
//         transition: 0.3s;
//         border-radius: 50px;">
//             <i class="fas fa-trash-alt"></i> Remove
//         </button> <hr>`;

//   clone.appendChild(removeBtn);

//   document.getElementById("familyContainer").appendChild(clone);
// });

// document.addEventListener("click", function (e) {
//   if (e.target.classList.contains("remove-fam")) {
//     e.target.closest(".group-fam").remove();
//   }
// });

// document.getElementById("addMorequa").addEventListener("click", function () {
//   let firstBlock = document.querySelector(".group-qua");
//   let clone = firstBlock.cloneNode(true);

//   clone.querySelectorAll("input").forEach((input) => {
//     input.value = "";
//   });

//   let removeBtn = document.createElement("div");
//   removeBtn.className = "col-12 text-end mb-3";
//   removeBtn.innerHTML = `<button type="button" class="btn btn-danger remove-qua"
//         style=" padding: 15px;
//         width: 120px;
//         border: none;
//         transition: 0.3s;
//         border-radius: 50px;">
//             <i class="fas fa-trash-alt"></i> Remove
//         </button> <hr>`;

//   clone.appendChild(removeBtn);

//   document.getElementById("qualificationContainer").appendChild(clone);
// });

// document.addEventListener("click", function (e) {
//   if (e.target.classList.contains("remove-qua")) {
//     e.target.closest(".group-qua").remove();
//   }
// });

// document.getElementById("addmorepro").addEventListener("click", function () {
//   let firstBlock = document.querySelector(".group-pro");
//   let clone = firstBlock.cloneNode(true);

//   clone.querySelectorAll("input").forEach((input) => {
//     input.value = "";
//   });

//   let removeBtn = document.createElement("div");
//   removeBtn.className = "col-12 text-end mb-3";
//   removeBtn.innerHTML = `<button type="button" class="btn btn-danger remove-pro"
//         style=" padding: 15px;
//         width: 120px;
//         border: none;
//         transition: 0.3s;
//         border-radius: 50px;">
//             <i class="fas fa-trash-alt"></i> Remove
//         </button> <hr>`;

//   clone.appendChild(removeBtn);

//   document.getElementById("professionalContainer").appendChild(clone);
// });

// document.addEventListener("click", function (e) {
//   if (e.target.classList.contains("remove-pro")) {
//     e.target.closest(".group-pro").remove();
//   }
// });

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
