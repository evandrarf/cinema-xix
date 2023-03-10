import "./bootstrap";
import "flowbite";

const alert = document.querySelector(".alert");

if (alert) {
  setTimeout(() => {
    alert.remove();
  }, 3000);
}
