  function nextFocus(inputF, inputS) {
          document.getElementById(inputF).addEventListener('keydown', function(event) {
            if (event.keyCode == 13) {
              document.getElementById(inputS).focus();
            }
          });
        }
        document.addEventListener("DOMContentLoaded", () => {
            const form = document.querySelector("form");
            form.addEventListener("keydown", event => {
              if (event.key === "Enter") {
                event.preventDefault();
              }
            });
          });