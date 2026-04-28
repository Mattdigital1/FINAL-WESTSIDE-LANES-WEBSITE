document.addEventListener("DOMContentLoaded", () => {
  const toggle = document.querySelector(".nav-toggle");
  const menu = document.querySelector(".nav ul");
  if (toggle && menu) {
    toggle.addEventListener("click", () => menu.classList.toggle("open"));
  }

  document.querySelectorAll(".js-year").forEach(el => el.textContent = new Date().getFullYear());

  const form = document.getElementById("contact-form");
  if (form) {
    form.addEventListener("submit", async (e) => {
      e.preventDefault();
      const btn = document.getElementById("form-submit");
      const status = document.getElementById("form-status");
      btn.disabled = true;
      btn.textContent = "Sending…";
      status.style.display = "none";

      try {
        const res = await fetch("contact-submit.php", {
          method: "POST",
          body: new FormData(form),
        });
        const data = await res.json();
        if (data.ok) {
          status.style.cssText = "display:block; background:#d1fae5; color:#065f46; padding:14px 18px; border-radius:10px; font-size:15px; font-weight:600;";
          status.textContent = "Message sent! We'll get back to you within one business day.";
          form.reset();
          btn.textContent = "Message sent";
        } else {
          throw new Error(data.error || "Unknown error");
        }
      } catch {
        status.style.cssText = "display:block; background:#fee2e2; color:#991b1b; padding:14px 18px; border-radius:10px; font-size:15px; font-weight:600;";
        status.textContent = "Something went wrong. Please call us at (504) 340-2695 instead.";
        btn.disabled = false;
        btn.textContent = "Send message";
      }
    });
  }
});
