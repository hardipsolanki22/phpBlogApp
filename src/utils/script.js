const [manu] = document.getElementsByClassName("menu_bar");
const [pageTitile] = document.getElementsByTagName("title");

const homePageNavigation = [
    {
        name: "Home",
        slug: "./index.php"
    },
    {
        name: "Create Blog",
        slug: "../postForm/"
    },
    {
        name: "My Blog",
        slug: "../myPosts/"
    }
];
const postFormNavigation = [
    {
        name: "Home",
        slug: "../home/"
    },
    {
        name: "Create Blog",
        slug: "./index.php"
    },
    {
        name: "My Blog",
        slug: "../myPosts/"
    }
];
const myPostsNavigation = [
    {
        name: "Home",
        slug: "../home/"
    },
    {
        name: "Create Blog",
        slug: "../postForm"
    },
    {
        name: "My Blog",
        slug: "./index.php"
    }
];

const createasideNav = (navItems) => {
    // create all elements as per need for navbar
    const aside = document.createElement("aside");
    aside.classList.add("aside_manu");
    const closeBtn = document.createElement("button");
    closeBtn.innerText = "X";
    closeBtn.classList.add("close_aside_manu");
    const ul = document.createElement("ul");
    ul.classList.add("aside_items");
    navItems.forEach((item) => {
        const li = document.createElement("li");
        const a = document.createElement("a");
        a.href = item.slug;
        a.classList.add("aside_item");
        const textNode = document.createTextNode(item.name);
        a.appendChild(textNode);
        li.appendChild(a);
        ul.appendChild(li);
    });
    const li = document.createElement("li");
    const form = document.createElement("form");
    const logOutBtn = document.createElement("button");
    logOutBtn.classList.add("aside_item");
    logOutBtn.innerText = "Logout";
    logOutBtn.type = "submit";
    logOutBtn.name = "logout";
    form.action = "../../utils/logout.php"
    form.method = "POST";
    li.appendChild(logOutBtn);
    form.appendChild(li);
    ul.appendChild(form);
    aside.append(closeBtn, ul);
    document.body.appendChild(aside);

    closeBtn.addEventListener("click", () => {
        aside.style.display = "none";
    });
    return () => { };
};

manu.addEventListener("click", () => {
    if (pageTitile.innerText == "Home") {
        createasideNav(homePageNavigation);
    } else if (pageTitile.innerText == "My Posts") {
        createasideNav(myPostsNavigation);
    } else if (pageTitile.innerText == "Post Form") {
        createasideNav(postFormNavigation);
    }
});

