document.addEventListener('DOMContentLoaded',()=>{
  const btn=document.querySelector('.seip-mobile-toggle');
  if(btn) btn.addEventListener('click',()=>document.body.classList.toggle('menu-open'));

  document.querySelectorAll('.seip-nav a').forEach(a=>{
    a.addEventListener('click',()=>document.body.classList.remove('menu-open'));
  });

  const search=document.querySelector('.seip-search');
  if(search){
    search.addEventListener('keydown',e=>{
      if(e.key==='Enter' && search.value.trim()){
        alert('Búsqueda de SEIP: '+search.value.trim());
      }
    });
  }
});
