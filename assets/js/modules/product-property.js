// for (let i = 1; i < 5; i++) {
//   const el = document.getElementById('tab' + i);

//   if (el) {
//     el.onclick = function () {
//       document.getElementById('tab' + i + 'Content').classList.toggle('show');
//     };
//   }
// }




const tabs = document.querySelectorAll(".deail-tab");
tabs.forEach((tab) => {
  tab.addEventListener("click", () => {
    tabs.forEach((t) => t.classList.remove("active"));
    document.querySelectorAll(".deail-cont").forEach((cont) => cont.classList.remove("active"));
    tab.classList.add("active");
    const content = tab.querySelector(".deail-cont");
    if (content) content.classList.add("active");
  });
});
