tabEvent();

function tabEvent() {
  document.addEventListener("DOMContentLoaded", () => {
    const tabButton = document.querySelectorAll(".js-tab_button");
    const tabTarget = document.querySelectorAll(".js-tab_target");

    for (let i = 0; i < tabButton.length; i++) {
      tabButton[i].addEventListener("click", event => {
        let currentMenu = event.currentTarget;
        let currentContent = document.getElementById(currentMenu.dataset.id);
        // 全てのタブのis-activeクラスを削除
        for (let i = 0; i < tabButton.length; i++) {
          tabButton[i].classList.remove("is-active");
        }
        //クリックしたタブにis-activeクラスを追加
        currentMenu.classList.add("is-active");

        for (let i = 0; i < tabTarget.length; i++) {
          tabTarget[i].classList.remove("is-active");
        }
        if (currentContent !== null) {
          currentContent.classList.add("is-active");
        }
      });
    }
  });
}
