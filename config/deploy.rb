lock '~> 3.16.0'

set :application, 'hanoitraffic.com'
set :repo_url, 'git@github.com:1vasari/hanoitraffic.com.git'
set :branch, :main
set :deploy_to, '/var/www/old.hanoitraffic.com'
set :keep_releases, 5
set :npm_flags, '--silent --no-progress'

namespace :assets do
  task :build do
    on roles(:web) do
      within release_path do
        execute :npm, :run, :build
      end
    end
  end
end

namespace :apache do
  task :reload do
    on roles(:web) do
      execute :systemctl, :reload, :apache2
    end
  end
end

after 'deploy:updated', 'assets:build'
after 'deploy:finished', 'apache:reload'
