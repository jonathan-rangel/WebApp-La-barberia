let step = 1,
    step_comment = 6;
const start_step = 1,
    final_step = 4,
    reservation = { id: "", name: "", date: "", time: "", services: [], products: [] };
function startApp() {
    showSection(), tabs(), pagerButtons(), prevPage(), nextPage(), showServices(), saveClientId(), saveClienName(), saveDate(), saveTime(), showSummary();
}
function showSection() {
    const e = document.querySelector(".show-section");
    e && e.classList.remove("show-section");
    document.querySelector("#step-" + step).classList.add("show-section");
    const t = document.querySelector(".current-tab");
    t && t.classList.remove("current-tab");
    document.querySelector(`[data-step="${step}"]`).classList.add("current-tab");
}
function showTypeComments() {
    const e = document.querySelector(".current-comment");
    e && e.classList.remove("current-comment");
    document.querySelector(`[data-step="${step_comment}"]`).classList.add("current-comment");
}
function tabs() {
    document.querySelectorAll(".tabs a").forEach((e) => {
        e.addEventListener("click", function (e) {
            (step = parseInt(e.target.dataset.step)), showSection(), pagerButtons();
        });
    });
}
function pagerButtons() {
    const e = document.querySelector("#previous"),
        t = document.querySelector("#next");
    1 === step ? (e.classList.add("hide"), t.classList.remove("hide")) : 4 === step ? (e.classList.remove("hide"), t.classList.add("hide"), showSummary()) : (e.classList.remove("hide"), t.classList.remove("hide")),
        5 === step && (e.classList.add("hide"), t.classList.add("hide"), getAPIComments(), buttonComments()),
        3 === step && showProducts(),
        showSection();
}
async function getAPIComments() {
    if (6 === step_comment)
        try {
            const e = "http://localhost:3000/api/comments/all",
                t = await fetch(e);
            showAllComments(await t.json());
        } catch (e) {
            console.log(e);
        }
    else
        try {
            const e = "http://localhost:3000/api/comments/user",
                t = await fetch(e);
            showUserComments(await t.json());
        } catch (e) {
            console.log(e);
        }
}
function showUserComments(e) {
    document.querySelector("#comments").textContent = "";
    const t = document.querySelector("#comments");
    if ((t.classList.replace("list-comments", "user-comments"), "0" === document.querySelector("#id").value)) {
        showAlert("Crea una cuenta para poder hacer comentarios", "error", "#step-5", !1);
        const e = document.createElement("A");
        return (e.textContent = "Crear una cuenta"), (e.href = "/create_account"), e.classList.add("button-create"), void t.appendChild(e);
    }
    const n = document.createElement("A");
    n.classList.add("button-change"),
        (n.href = "/comments/add"),
        (n.textContent = "Agregar comentario"),
        document.querySelector("#comments").appendChild(n),
        e.forEach((e) => {
            const { id: t, user_name: n, date: c, comment_details: o } = e,
                s = document.createElement("DIV");
            s.classList.add("container-all");
            const a = document.createElement("DIV");
            a.classList.add("container-div");
            const r = document.createElement("DIV");
            r.classList.add("container-info");
            const d = document.createElement("P");
            d.classList.add("user-name-comment"), (d.textContent = n);
            const i = document.createElement("P");
            i.classList.add("date-comment"), (i.textContent = c), r.appendChild(d), r.appendChild(i);
            const l = document.createElement("P");
            l.classList.add("comment-text"), (l.textContent = o);
            const m = document.createElement("DIV");
            m.classList.add("comment"), (m.dataset.commentId = t), m.appendChild(l);
            const u = document.createElement("DIV");
            u.classList.add("container-buttons");
            const p = document.createElement("A");
            p.classList.add("button-edit"), (p.href = "/comments/edit?id=" + t), (p.textContent = "Editar comentario");
            const h = document.createElement("FORM");
            (h.action = "/comments/delete"), (h.method = "POST");
            const v = document.createElement("INPUT");
            (v.type = "hidden"), (v.name = "id"), (v.value = t);
            const C = document.createElement("INPUT");
            (C.type = "submit"),
                C.classList.add("button-delete"),
                (C.value = "Borrar"),
                h.appendChild(v),
                h.appendChild(C),
                u.appendChild(p),
                u.appendChild(h),
                a.appendChild(r),
                a.appendChild(m),
                s.appendChild(a),
                s.appendChild(u),
                document.querySelector("#comments").appendChild(s);
        });
}
function showAllComments(e) {
    (document.querySelector("#comments").textContent = ""),
        document.querySelector("#comments").classList.contains("user-comments") && document.querySelector("#comments").classList.replace("user-comments", "list-comments"),
        e.forEach((e) => {
            const { id: t, user_name: n, date: c, comment_details: o } = e,
                s = document.createElement("DIV");
            s.classList.add("container-div");
            const a = document.createElement("DIV");
            a.classList.add("container-info");
            const r = document.createElement("P");
            r.classList.add("user-name-comment"), (r.textContent = n);
            const d = document.createElement("P");
            d.classList.add("date-comment"), (d.textContent = c), a.appendChild(r), a.appendChild(d);
            const i = document.createElement("P");
            i.classList.add("comment-text"), (i.textContent = o);
            const l = document.createElement("DIV");
            l.classList.add("comment"), (l.dataset.commentId = t), l.appendChild(i), s.appendChild(a), s.appendChild(l), document.querySelector("#comments").appendChild(s);
        });
}
function buttonComments() {
    document.querySelectorAll(".type-comments button").forEach((e) => {
        e.addEventListener("click", function (e) {
            (step_comment = parseInt(e.target.dataset.step)), getAPIComments(), showTypeComments();
        });
    });
}
function prevPage() {
    document.querySelector("#previous").addEventListener("click", function () {
        step <= 1 || (step--, ul(step - 1), pagerButtons());
    });
}
function nextPage() {
    document.querySelector("#next").addEventListener("click", function () {
        step >= 4 || (step++, ul(step - 1), pagerButtons());
    });
}

function showProducts() {
    const products = document.querySelectorAll(".product");
    products.forEach(product => {
        product.onclick = function() {
            selectProduct(product.dataset.productId, product.dataset.productName, product.dataset.productPrice);
        }
    });
}

function showServices() {
    const services = document.querySelectorAll(".service");
    services.forEach(service => {
        service.onclick = function() {
            selectService(service.dataset.serviceId, service.dataset.serviceName, service.dataset.servicePrice);
        }
    });
}
function selectProduct(productId, productName, productPrice) {
    const product = {
        id: productId,
        name: productName,
        price: productPrice 
    };
    const {id: t} = product, { products: n } = reservation;
    c = document.querySelector(`[data-product-id="${t}"]`);
    n.some((product) => product.id === t) ? ((reservation.products = n.filter((product) => product.id !== t)), c.classList.remove("selected")) : ((reservation.products = [...n, product]), c.classList.add("selected"));
}
function selectService(serviceId, serviceName, servicePrice) {
    const service = {
        id: serviceId,
        name: serviceName,
        price: servicePrice 
    };
    const {id: t} = service, { services: n } = reservation;
    c = document.querySelector(`[data-service-id="${t}"]`);
    n.some((service) => service.id === t) ? ((reservation.services = n.filter((service) => service.id !== t)), c.classList.remove("selected")) : ((reservation.services = [...n, service]), c.classList.add("selected"));
}

function saveClientId() {
    reservation.id = document.querySelector("#id").value;
}
function saveClienName() {
    reservation.name = document.querySelector("#name").value;
}
function saveDate() {
    document.querySelector("#date").addEventListener("input", function (e) {
        const t = new Date(e.target.value).getUTCDay();
        [1].includes(t) ? ((e.target.value = ""), showAlert("Los lunes no hay servicio", "error", ".form")) : (reservation.date = e.target.value);
    });
}
function saveTime() {
    document.querySelector("#time").addEventListener("input", function (e) {
        const t = e.target.value.split(":")[0];
        t < 12 || t > 21 ? ((e.target.value = ""), showAlert("No hay servicio a esa hora", "error", ".form")) : (reservation.time = e.target.value);
    });
}
function showAlert(e, t, n, c = !0) {
    const o = document.querySelector(".alert");
    o && o.remove();
    const s = document.createElement("DIV");
    (s.textContent = e), s.classList.add("alert"), s.classList.add(t);
    document.querySelector(n).appendChild(s),
        c &&
            setTimeout(() => {
                s.remove();
            }, 3e3);
}
function showSummary() {
    const e = document.querySelector(".content-sum");
    for (; e.firstChild; ) e.removeChild(e.firstChild);
    if ("0" === document.querySelector("#id").value) {
        showAlert("Debes tener una cuenta para poder hacer una reservación", "error", "#step-4", !1);
        const t = document.createElement("A");
        return (t.textContent = "Crear una cuenta"), (t.href = "/create_account"), t.classList.add("button-create"), void e.appendChild(t);
    }
    if (Object.values(reservation).includes("") || 0 === reservation.services.length) showAlert("Debes agregar mínimo un servicio y/o llenar todos los datos", "error", "#step-4", !1);
    else {
        let t = 0;
        const n = document.createElement("H3");
        (n.textContent = "Información de la reservación"), e.appendChild(n);
        const { name: c, date: o, time: s, services: a, products: r } = reservation,
            d = document.createElement("P");
        d.innerHTML = "<span>Nombre:</span> " + c;
        const i = new Date(o),
            l = i.getUTCMonth(),
            m = i.getDate() + 2,
            u = i.getFullYear(),
            p = { weekday: "long", year: "numeric", month: "long", day: "numeric" },
            h = new Date(Date.UTC(u, l, m)).toLocaleDateString("es-MX", p),
            v = document.createElement("P");
        v.innerHTML = "<span>Fecha:</span> " + h;
        const C = document.createElement("P");
        (C.innerHTML = "<span>Hora:</span> " + s), e.appendChild(d), e.appendChild(v), e.appendChild(C);
        const f = document.createElement("H3");
        (f.textContent = "Servicios seleccionados"),
            e.appendChild(f),
            a.forEach((n) => {
                const { id: c, name: o, price: s, description: a } = n,
                    r = document.createElement("DIV");
                r.classList.add("service-container");
                const d = document.createElement("P");
                d.textContent = o;
                const i = document.createElement("P");
                (i.innerHTML = "<span>Precio:</span> $" + s), (t += parseInt(s)), r.appendChild(d), r.appendChild(i), e.appendChild(r);
            });
        const L = document.createElement("H3");
        (L.textContent = "Productos extra agregados"),
            e.appendChild(L),
            r.forEach((n) => {
                const { id: c, name: o, price: s, description: a, image: r } = n,
                    d = document.createElement("DIV");
                d.classList.add("product-container");
                const i = document.createElement("P");
                i.textContent = o;
                const l = document.createElement("P");
                (l.innerHTML = "<span>Precio:</span> $" + s), (t += parseInt(s)), d.appendChild(i), d.appendChild(l), e.appendChild(d);
            }),
            console.log(t);
        const y = document.createElement("P");
        y.classList.add("total"), (y.innerHTML = "<span>Total a pagar: </span> $ " + t), e.appendChild(y);
        const E = document.createElement("DIV");
        E.classList.add("container-submit");
        const S = document.createElement("BUTTON");
        S.classList.add("button-edit"), (S.textContent = "Reservar"), (S.onclick = doReservation), E.appendChild(S), e.appendChild(E);
    }
}
async function doReservation() {
    const { id: e, date: t, time: n, services: c, products: o } = reservation,
        s = c.map((e) => e.id),
        a = o.map((e) => e.id),
        r = new FormData();
    r.append("userId", e), r.append("date", t), r.append("time", n), r.append("services", s), r.append("products", a);
    try {
        const e = "http://localhost:3000/api/reservations",
            t = await fetch(e, { method: "POST", body: r });
        (await t.json()).result &&
            Swal.fire({ icon: "success", title: "Reservación creada", text: "Has reservado una cita en La barbería ©" }).then(() => {
                window.location.reload();
            });
    } catch (e) {
        Swal.fire({ icon: "error", title: "Hubo un error", text: "No se pudo hacer la reservación" });
    }
}
function ul(e) {
    console.log("click!" + e);
    for (var t = document.querySelectorAll(".underline"), n = 0; n < t.length; n++) t[n].style.transform = "translate3d(" + 100 * e + "%,0,0)";
}
document.addEventListener("DOMContentLoaded", function () {
    startApp();
});
