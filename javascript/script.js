const searchArtist = document.querySelector('#searchartist')
if (searchArtist) {
  searchArtist.addEventListener('input', async function() {
    const response = await fetch('../api/api_artists.php?search=' + this.value)
    const artists = await response.json()

    const section = document.querySelector('#artists')
    section.innerHTML = ''

    for (const artist of artists) {
      const article = document.createElement('article')
      const img = document.createElement('img')
      img.src = 'https://picsum.photos/200?' + artist.id
      const link = document.createElement('a')
      link.href = '../pages/artist.php?id=' + artist.id
      link.textContent = artist.name
      article.appendChild(img)
      article.appendChild(link)
      section.appendChild(article)
    }
  })
}