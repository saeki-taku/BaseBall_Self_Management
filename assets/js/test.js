window.addEventListener("DOMContentLoaded", () => {
  new Tab(document.getElementById("js-tab"));
});

class Tab {
  constructor(root, options) {
    const defaultOptions = {
      firstView: 1 // 何枚目のパネルを初期表示にするか
    };

    const mergedOptions = Object.assign(defaultOptions, options);
    this.option = mergedOptions;

    // タブコンポーネントの親要素
    this.root = root;
    if (!this.root) return;

    this.tablist = this.root.querySelector('[role="tablist"]');
    if (!this.tablist) throw TypeError('role="tablist"は必須です');

    this.tabs = this.root.querySelectorAll('[role="tab"]');
    if (!this.tabs.length) throw TypeError('role="tab"は必須です');

    this.tabpanels = this.root.querySelectorAll('[role="tabpanel"]');
    if (!this.tabpanels.length) throw TypeError('role="tabpanel"は必須です');

    this.prepareAttributes();
    this.showFirstView();

    this.tabs.forEach((tab) => {
      attachEvent(tab, "click", this.show.bind(this));
      attachEvent(tab, "keyup", this.move.bind(this));
    });
  }

  prepareAttributes() {
    const randomId = Math.random().toString(32).substring(2);

    this.tabs.forEach((tab, index) => {
      tab.setAttribute("id", `tab-${randomId}-${index}`);
      tab.setAttribute("href", `#tabpanel-${randomId}-${index}`);
      tab.setAttribute("aria-controls", `tabpanel-${randomId}-${index}`);
      tab.setAttribute("aria-selected", false);
      tab.setAttribute("tabindex", "-1");
    });

    this.tabpanels.forEach((tabpanel, index) => {
      tabpanel.setAttribute("id", `tabpanel-${randomId}-${index}`);
      tabpanel.setAttribute("aria-labelledby", `tab-${randomId}-${index}`);
      tabpanel.style.display = "none";
    });
  }

  showFirstView() {
    const settingIndex = Number(this.option.firstView) - 1;
    const index =
      typeof this.tabs[settingIndex] !== "undefined" ? settingIndex : 0;

    this.tabs[index].setAttribute("tabindex", "0");
    this.tabs[index].setAttribute("aria-selected", true);
    this.tabpanels[index].style.display = "";
  }

  show(event) {
    event.preventDefault();
    const targetTab = event.currentTarget;

    this.tabs.forEach((tab) => {
      tab.setAttribute("aria-selected", false);
      tab.setAttribute("tabindex", "-1");
    });

    this.tabpanels.forEach((tabpanel) => {
      tabpanel.style.display = "none";
    });

    const targetId = targetTab.getAttribute("aria-controls");
    const targetTabpanel = document.getElementById(targetId);

    targetTab.setAttribute("tabindex", "0");
    targetTab.setAttribute("aria-selected", true);
    targetTabpanel.style.display = "";
  }

  move(event) {
    const pressArrowLeft = event.key === "ArrowLeft" || event.key === "Left";
    const pressArrowRight = event.key === "ArrowRight" || event.key === "Right";
    const pressEnter = event.key === "Enter";
    const pressSpace = event.key === " ";

    let index = Array.from(this.tabs).indexOf(event.currentTarget);
    if (pressArrowLeft) index -= 1;
    if (pressArrowRight) index += 1;
    if (index === -1) index = this.tabs.length - 1;
    if (index === this.tabs.length) index = 0;

    const target = this.tabs[index];

    if (pressArrowLeft || pressArrowRight) {
      target.focus();
    }

    if (pressEnter || pressSpace) {
      event.preventDefault();
      target.focus();
      target.click();
    }
  }
}

function attachEvent(element, event, handler, options) {
  element.addEventListener(event, handler, options);
  return {
    unsubscribe() {
      element.removeEventListener(event, handler);
    }
  };
}
