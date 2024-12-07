// Array de caminhos das imagens
const imagens = [
  'img/0.png',
  'img/1.png',
  'img/2.png',
  'img/3.png',
  'img/4.png',
  'img/5.png',
  'img/6.png',
  'img/7.png'
];

// Função para mostrar uma imagem aleatória
function mostrarImagemAleatoria() {
  // Gerar um índice aleatório dentro do tamanho do array de imagens
  const indiceAleatorio = Math.floor(Math.random() * imagens.length);
  
  // Selecionar a imagem pelo id e atualizar o src
  const imagemElement = document.getElementById('imagem');
  imagemElement.src = imagens[indiceAleatorio];
}

// Chama a função ao carregar a página
window.onload = mostrarImagemAleatoria;

// Função para alternar entre modo de edição e visualização
document.getElementById('edit-btn').addEventListener('click', function () {
  const form = document.getElementById('edit-form');
  const avatar = document.querySelector('.card__avatar');
  const title = document.querySelector('.card__title');
  const subtitle = document.querySelector('.card__subtitle');
  const card = document.querySelector('.card');  // O contêiner do card
  const isEditing = form.style.display === 'block';

  if (isEditing) {
      alert('Informações atualizadas com sucesso!');
      document.getElementById('user-name').innerText = document.getElementById('edit-name').value;
      document.getElementById('user-email').innerText = document.getElementById('edit-email').value;

      // Reverter para estado original
      this.style.display = 'inline'; // Torna o botão visível novamente
      document.getElementById('delete-btn').innerText = 'Excluir';

      // Mostrar novamente título e subtítulo
      title.style.display = 'block';
      subtitle.style.display = 'block';
      avatar.classList.remove('editing');
      card.classList.remove('card__edit-mode');  // Remover a classe para voltar ao layout original
  } else {
      // Ativar modo de edição
      form.style.display = 'block';
      this.style.display = 'none'; // Torna o botão de editar invisível instantaneamente

      // Mudar o texto do botão de editar para 'Atualizar'
      document.getElementById('delete-btn').innerText = 'Cancelar';

      // Esconder título e subtítulo
      title.style.display = 'none';
      subtitle.style.display = 'none';

      // Adicionar classe para mover o avatar
      avatar.classList.add('editing');
      card.classList.add('card__edit-mode');  // Adicionar a classe para aplicar os estilos de edição
  }

  form.style.display = isEditing ? 'none' : 'block';
});

// Cancelar edição
document.getElementById('delete-btn').addEventListener('click', function () {
  const form = document.getElementById('edit-form');
  const avatar = document.querySelector('.card__avatar');
  const title = document.querySelector('.card__title');
  const subtitle = document.querySelector('.card__subtitle');
  const card = document.querySelector('.card');
  const isEditing = form.style.display === 'block';

  if (isEditing) {
      // Reverter alterações
      form.style.display = 'none';
      document.getElementById('edit-btn').style.display = 'inline'; // Torna o botão de editar visível novamente
      this.innerText = 'Excluir';

      // Mostrar novamente título e subtítulo
      title.style.display = 'block';
      subtitle.style.display = 'block';
      avatar.classList.remove('editing');
      card.classList.remove('card__edit-mode');
  } else {
      // Abrir alerta de confirmação
      document.getElementById('alert-box').style.display = 'flex';
  }
});


// Gerenciar alerta de exclusão
document.getElementById('confirm-delete').addEventListener('click', function () {
  alert('Conta excluída com sucesso!');
  document.getElementById('alert-box').style.display = 'none';
});

document.getElementById('cancel-delete').addEventListener('click', function () {
  document.getElementById('alert-box').style.display = 'none';
});

