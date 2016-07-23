server 'rb-dev.co.uk', user: 'rbdev', roles: %w{app db web}, primary: true

set :deploy_to,   '/var/www/vhosts/rb-dev.co.uk/boilerplate.rb-dev.co.uk'
set :keep_releases,  1
set :file_permissions_users, ['www-data']
set :branch, 'develop'
