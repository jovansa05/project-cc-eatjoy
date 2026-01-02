pipeline {
    agent any

    stages {
        stage('Checkout Source Code') {
            steps {
                echo 'Mengambil source code dari GitHub...'
                checkout scm
            }
        }

        stage('Verify Repository') {
            steps {
                bat 'dir'
            }
        }

        stage('Simulation Build') {
            steps {
                echo 'Pipeline percobaan berhasil dijalankan'
            }
        }
    }
}
