const manu = document.querySelector(".menu_bar");


const createasideNav = (navItems) => {
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
        form.action = "../utils/logout.php"
        form.method = "POST";
        li.appendChild(logOutBtn);
        form.appendChild(li);
        ul.appendChild(form);
        aside.append(closeBtn, ul);
        document.body.appendChild(aside);        

        closeBtn.addEventListener("click", () => {
            console.log("click");
            aside.style.display = "none";
        });
        return () => {};
}

const navItems = [
    {
        name: "Home",
        slug: "./home.php"
    },
    {
        name: "Create Blog",
        slug: "./postForm.php"
    },
    {
        name: "My Blog",
        slug: "./myBlog.php"
    },
];

manu.addEventListener("click", () => {
    createasideNav(navItems)
});

