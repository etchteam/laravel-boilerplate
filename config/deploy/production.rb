server 'rb-test.co.uk', user: 'rbtest', roles: %w{app db web}, primary: true

set :deploy_to,   '/var/www/vhosts/rb-test.co.uk/boilerplate.rb-test.co.uk'
set :keep_releases,  1
set :file_permissions_users, ['www-data']
set :branch, 'master'
