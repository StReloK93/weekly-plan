import{d as b,u as h,c as I,a as r,b as t,w as o,e as l,f as v,r as e,o as s,F as C,g as R,h as x,i as w,t as g,j as B}from"./app-DF3pp32Z.js";const k={class:"flex"},N={class:"relative flex-grow"},T={class:"absolute inset-0"},E=b({__name:"ResultsPage",setup(F){const{t:i}=h({useScope:"global"}),c=v().getRoutes().find(a=>a.name==="results"),u=I(()=>c?c.children||[]:[]);return(a,y)=>{const _=e("VaIcon"),m=e("VaSidebarItemTitle"),d=e("VaSidebarItemContent"),V=e("VaSidebarItem"),f=e("VaSidebar"),p=e("RouterView"),S=e("VaScrollContainer");return s(),r("section",k,[t(f,null,{default:o(()=>[(s(!0),r(C,null,R(u.value,n=>(s(),x(V,{to:{name:n.name},active:a.$route.name==n.name},{default:o(()=>[t(d,null,{default:o(()=>[t(_,{name:n.meta.icon},null,8,["name"]),t(m,null,{default:o(()=>[w(g(B(i)(n.meta.text)),1)]),_:2},1024)]),_:2},1024)]),_:2},1032,["to","active"]))),256))]),_:1}),l("section",N,[l("div",T,[t(S,{class:"h-full p-3",vertical:""},{default:o(()=>[t(p)]),_:1})])])])}}});export{E as default};