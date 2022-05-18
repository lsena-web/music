# YourMusic
Loja de música simples desenvolvida com o framework Laravel e usada para fins didáticos.


## Observações

- Para acessar a área administrativa será preciso rodar a seeder: UserSeeder::class

- Caso queira gerar varios ábuns pode rodar a seeder: AlbumSeeder::class

- Caso queira gerar músicas para albuns aleatórios pode rodar a seeder MusicaSeeder::class


# Importante

A seeder MusicaSeeder::class não pode ser executada antes da seeder AlbumSeeder::class

# Obrigatório

- Configurar o .env FILESYSTEM_DISK=public

- Criar um link simbólico com o comando php artisan storage:link

