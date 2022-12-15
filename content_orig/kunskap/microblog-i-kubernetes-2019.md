### Microblog i Kubernetes {#microblog}

Nu ska vi sätta upp Microbloggen i Kubernetes. Vi behöver en miljö att köra K8s i. AWS har en managed Kubernetes service kallat [EKS](https://aws.amazon.com/eks/) men det kostar ju massa kredit vilket vi inte har oändligt at så vi kommer använda oss utan [Kubernetes Operations](https://github.com/kubernetes/kops) (Kops). Kops skriver om sig själva "The easiest way to get a production grade Kubernetes cluster up and running." och än så länge har det varit väldigt trevlig att använda. Vi ska använda Kops för att sätta upp ett K8s kluster på vanliga EC2 servrar på AWS så blir det billigare än att använda EKS.

Ni kommer jobba mot klustret på liknande sätt som med Ansible. Installera verktygen lokalt och sen kommer Kops att jobba mot AWS och styra servrar.



#### Kubernetes på AWS med Kops {#k8s_aws}
<!-- 
https://medium.com/containermind/how-to-create-a-kubernetes-cluster-on-aws-in-few-minutes-89dda10354f4
https://github.com/kubernetes/kops/blob/master/docs/install.md
https://kubernetes.io/docs/setup/production-environment/tools/kops/
 -->

Vi behöver använda följande verktyg för att få upp ett kluster [Kops](https://github.com/kubernetes/kops), [kubectl](https://kubernetes.io/docs/reference/kubectl/overview/) och [AWS cli](https://docs.aws.amazon.com/cli/latest/userguide/cli-chap-welcome.html).



##### Installera verktyg {#install}

- Installera [kubectl](https://kubernetes.io/docs/tasks/tools/install-kubectl/), jag rekommendera att göra [Enabling shell autocompletion](https://kubernetes.io/docs/tasks/tools/install-kubectl/#enabling-shell-autocompletion) så kan ni använda `tab` för att autocomplete kommandon och resurser i kubectl.

- Installera aws-cli med `pip3 install awscli --upgrade --user`.

- Installera [Kops](https://github.com/kubernetes/kops#installing).

När allt är installerat behöver både AWS cli och Kops era AWS nycklar som miljövariabler men de använder olika namn för samma nyckel. I mappen `kubernetes` kan ni hitta filen `export_aws_keys.sh`. Den fungera som insert skriptet i Ansible, så kopiera era AWS nycklar och kör skriptet med `. export_aws_keys.sh`.



##### Domän för Kubernetes klustret {#doman}

Kops behöver ett domännamn kopplat till klustret, ni kan välja att använda samma domän ni redan har eller att skapa en specifik subdomän för k8s. Om ni använder samma domän behöver ni gå in i Route 53 och ta bort de Record sets med `Type A`. Kops kommer skapa egna records. Om ni skapar en subdomän för klustret gör följande:

1. skapa en ny hosted zone och döp den till vad ni vill att subdomänen ska heta, jag döpte min till `k8s.<domain>`.

1. Kopiera `NS` värdena för er subdomänen.

1. Gå sen till förälder domänens hosted zone och skapa ett nytt Record set, med typen NS.

1. Klistra in NS värdena ni kopierade som values.

I terminalen kan ni köra `dig NS <subdomain>` för att kolla att den har rätt NS värden.



##### S3 Bucket för klustret {#s3}

Vi börjar med att konfigurera AWS cli, välj None på alla utom `region` i och med att vi har AWS nycklarna som ENV variabler.

```
aws configure

AWS Access Key ID [None]:
AWS Secret Access Key [None]:
Default region name [None]: us-east-1
Default output format [None]:
```

Kops behöver någonstans att spara data om klustret efter att vi skapat det. Vi ska använda en [S3 bucket på AWS](https://docs.aws.amazon.com/AmazonS3/latest/dev/Welcome.html) (Simple Storage Service), om vi hade varit på ett företag och flera personer ska kunna jobba mot klustret kan alla få tillgång till Bucket:en då behöver vi inte spara undan all data och skicka den mellan alla på något sätt. VI kopplar klustrets namn till domänen det ska vara kopplat till.

```
bucket_name=clusters.<domain>
export KOPS_STATE_STORE=s3://${bucket_name}

aws s3api create-bucket \
--bucket ${bucket_name} \
--region us-east-1
```



##### Skapa Kubernetes kluster {#skapa}

Vi börjar med att sätta namn på klustret.

```
export KOPS_CLUSTER_NAME=k8s.<domain>
```

Skapa kluster konfiguration.

```
kops create cluster --node-count=2 --node-size=t2.medium --zones=us-east-1a --name=${KOPS_CLUSTER_NAME} --master-size=t2.medium --ssh-public-key=<path-to-ssh-.pub-key>

kops get cluster
```

Ni kan kolla över hela konfigurationen med `kops edit cluster`. Vi vill inte ändra något i den så bara stäng ner den igen när ni kollat vad som finns där.

Nu ska vi skapa klustret och servrarna på AWS.

```
kops update cluster --yes
```

Nu kan ni spamma `kops validate cluster` till klustret är redo, det kan ta flera minuter innan domänen och allt är uppe och rullar. Vi har skapat 3 servrar på AWS, 1 master och 2 nodes.

När ni kan se `Your cluster <domain> is ready` har ni ett fungerande Kubernetes kluster upp och rullar. Nu kan ni köra `kubectl -n kube-system get po` för att se alla delar av klustret.

När ni ska stänga ner klustret kan ni göra det med

```
kops delete cluster  --yes
```

Det kommer ta bort alla servrar på AWS.

<!-- 
Spara er Kubernetes konfiguration.

```
kops get -o yaml > k8s-config.yml
kops create -f k8s-config.yml
kops update cluster --ssh-public-key=~/.ssh/aws.pub --yes
```
-->


##### Dashboard {#dashboard}

Det finns en [dashboard för K8s kluster](https://kubernetes.io/docs/tasks/access-application-cluster/web-ui-dashboard/), vi ska installer. Så vi får en grafisk vy för klustret.

```
kubectl apply -f https://raw.githubusercontent.com/kubernetes/dashboard/v1.10.1/src/deploy/recommended/kubernetes-dashboard.yaml
```

Sen behöver vi en token för att logga in på UI:t, `kops get secrets admin --type secret -oplaintext`, kopiera utskriften.

Nu ska vi börja använda `kubectl` för at jobba mot klustret och starta en proxy till klustret för att komma åt  UI:t.

```
kubectl proxy
```

Gå till `http://localhost:8001/api/v1/namespaces/kube-system/services/https:kubernetes-dashboard:/proxy` i webbläsaren och logga in med token. Läs [using dashboard](https://kubernetes.io/docs/tasks/access-application-cluster/web-ui-dashboard/#using-dashboard) för en snabb överblick av UI:t.

Nu är vi redo att börja sätta upp Microbloggen på klustret. Vi börjar med att få upp en databas.



#### Mysql i Kubernetes {#mysql}
<!--
secret from https://www.serverlab.ca/tutorials/containers/kubernetes/how-to-deploy-mysql-server-5-7-to-kubernetes/
setup deployment https://kubernetes.io/docs/tasks/run-application/run-single-instance-stateful-application/
 -->

Vi läste tidigare att det inte är så bra att köra database i K8s, men vi gör det ändå för att öva på stateful applikationer. Vi ska använda PersistentVolumeClaim för att få stateful data åt databasen. Det är inte säkert egentligen då vi förlorar all data om noderna går ner. Om vi har gjort detta i verkligheten hade vi kopplat datan till en S3 Bucket också.



##### Skydda lösenord med Secrets {#secrets}

Vi börjar med att skapa en [secret](https://kubernetes.io/docs/concepts/configuration/secret/) file då vi kommer sätta lösenord i deployments filerna. Vi behöver ett root lösenord och en lösenord åt Microblogen.

```
echo -n "my-super-secret-root-password" | base64
<password-string>

echo -n "micropassw" | base64
<password-string>
```

Skapa en fil, `mysql-secrets.yml`.

```
---
apiVersion: v1
kind: Secret
metadata:
  name: mysql-secrets
type: Opaque
data:
  ROOT_PASSWORD: <password-string>
  DB_PASSWORD: <password-string>
```

Aktivera dem i kubectl.

```
kubectl apply -f mysql-secrets.yml

kubectl get secret
NAME                  TYPE                                  DATA   AGE
default-token-8ld8g   kubernetes.io/service-account-token   3      37m
mysql-secrets         Opaque                                2      36s

kubectl describe secret mysql-secrets
Name:         mysql-secrets
Namespace:    default
Labels:       <none>
Annotations:
Type:         Opaque

Data
====
DB_PASSWORD:    34 bytes
ROOT_PASSWORD:  29 bytes
```



##### Persisten data med PersistentVolumeClaim {#mysql-pvc}

Skapa filen `mysql-pv.yml`.

```
apiVersion: v1
kind: PersistentVolume
metadata:
  name: mysql-pv-volume
  labels:
    type: local
spec:
  storageClassName: manual
  capacity:
    storage: 5Gi
  accessModes:
    - ReadWriteOnce
  hostPath:
    path: "/mnt/data"
---
apiVersion: v1
kind: PersistentVolumeClaim
metadata:
  name: mysql-pv-claim
spec:
  storageClassName: manual
  accessModes:
    - ReadWriteOnce
  resources:
    requests:
      storage: 5Gi
```

Vi skapar en Volym med 5 gig och `ReadWriteOnce` så at bara en nod kan använda volymen.

```
kubectl apply -f mysql-pv.yml

kubectl get persistentvolumeclaim mysql-pv-claim
NAME             STATUS   VOLUME            CAPACITY   ACCESS MODES   STORAGECLASS   AGE
mysql-pv-claim   Bound    mysql-pv-volume   5Gi        RWO            manual         66s
```



##### Mysql deployment {#mysql-deploy}

Skapa filen `mysql-deployment.yml`. I den skapar vi en Service, så att Microblogen sen kan koppla upp sig mot databasen.

```
apiVersion: v1
kind: Service
metadata:
  name: mysql
spec:
  ports:
  - port: 3306
  selector:
    app: mysql
  clusterIP: None
```

Vi sätter `clusterIP: None` så att Servicens IP kopplas direkt mot POD:en. Det är att föredra om man bara ska ha en POD bakom en service, vilket vi ska.

Lägg till följande i slutet av filen.

```
---
apiVersion: apps/v1 # for versions before 1.9.0 use apps/v1beta2
kind: Deployment
metadata:
  name: mysql
spec:
  selector:
    matchLabels:
      app: mysql
  strategy:
    type: Recreate
  template:
    metadata:
      labels:
        app: mysql
    spec:
      containers:
      - image: mysql:5.7
        name: mysql
        env:
          # Use secret in real usage
        - name: MYSQL_USER
          value: <user>
        - name: MYSQL_DATABASE
          value: <db_name>
        - name: MYSQL_PASSWORD
          valueFrom:
            secretKeyRef:
              name: mysql-secrets
              key: DB_PASSWORD
        - name: MYSQL_ROOT_PASSWORD
          valueFrom:
            secretKeyRef:
              name: mysql-secrets
              key: ROOT_PASSWORD
        ports:
        - containerPort: 3306
          name: mysql
        volumeMounts:
        - name: mysql-persistent-storage
          mountPath: /var/lib/mysql
      volumes:
      - name: mysql-persistent-storage
        persistentVolumeClaim:
          claimName: mysql-pv-claim
```

Vi läser lösenorden från secrets och mountar PV:n vi skapade tidigare. Notera ` strategy:` `type: Recreate`, det gör att K8s inte gör rolling updates. Vi vill inte använda det för databasen i och med att vi bara vill ha en igång åt gången. Nu kommer POD:en först soppas och en startas en ny med uppdaterade konfiguration.

Nu kan vi starta mysql.

```
kubectl apply -f mysql-deployment.yml

kubectl get pods -l app=mysql
NAME                     READY   STATUS    RESTARTS   AGE
mysql-647b4cc668-nwmnm   1/1     Running   0          22s
```

Ni kan testa koppla upp er till databasen.

```
kubectl run -it --rm --image=mysql:5.7 --restart=Never mysql-client -- mysql -h mysql -pmy-super-secret-root-password

mysql> show databases;
+--------------------+
| Database           |
+--------------------+
| information_schema |
| microblog          |
| mysql              |
| performance_schema |
| sys                |
+--------------------+
5 rows in set (0.00 sec)

mysql>
```

Nu har vi en database i Kubernetes vi kan koppla Microbloggen till.

<!--
kubectl delete deployment,svc mysql
kubectl delete pvc mysql-pv-claim
kubectl delete pv mysql-pv-volume
-->



#### Microblog deployment {#microblog}

Nästa steg är då att skapa en deployment för Microblogen. Ni borde ha lärt er tillräckligt för att skapa en service och deployment för Microblogen. Skriv konfigurationen i en fil med namnet `microblog-deployment.yml`. Den ska ha 2 replicas, så att det alltid finns två pods rullande som kan hantera trafik.

Ni behöver skapa en ny image av er Microblog och publicera till DockerHub. Ni kommer inte använda er av statsd i K8s och då kommer er nuvarande image generera fel för att Gunicorn inte kan koppla upp sig mot statsd. Skapa en nu image utan statsd konfigurationen i Gunicorn och ge den versionen `no-statsd` på DockerHub.

Kolla i er `docker-compose.yml` för vilka env variabler ni behöver för att starta containern. Ni kan använda `mysql` istället för en IP till database i env variabeln `DATABASE_URL`. OBS! starta inte containern med ett specifikt network i er deployment vi låter K8s hantera nätverk och Gunicorn behöver inte koppla upp sig till statsd.

För att felsöka kan ni använda följande kommandon och UI:t.

```
kubectl get po

kubectl describe po

kubectl describe deployment microblog

kubectl logs <pod-name>
```

Nästa steg är att sätta upp https och koppla domän till microbloggen, men ni kan redan nu skapa en LoadBalancer eller NodePort Service till microblogen så att den får en extern-ip. Ni kan få fram URL:en till microblogen med `kubectl get svc` och kolumnen `EXTERNAL-IP`. För mig var det `a0c6658f7626f461f925fa51f0a05c54-735889698.us-east-1.elb.amazonaws.com:5000`. [Här](https://medium.com/google-cloud/kubernetes-nodeport-vs-loadbalancer-vs-ingress-when-should-i-use-what-922f010849e0) kan ni läsa en kort sammanfattning om de olika services som finns och skillnaden.



#### HTTPS till klustret {#https}
<!-- https://cert-manager.io/docs/tutorials/acme/ingress/#step-2-deploy-the-nginx-ingress-controller -->

Vi vill så klart koppla vårt domännamn och och sätta upp HTTPS till applikationen. Det finns en del olika lösningar för att få till det. Vi kommer att använda oss utav en [Nginx ingress](https://kubernetes.github.io/ingress-nginx) (blir vår load balancer) och [Cert-manager](https://cert-manager.io) (hanterar Let's Encrypt certifikat). Vi ska också använda oss utav [Helm](https://helm.sh/) vilket är en packet manager för K8s.

Jobba igenom [Helm quickstart](https://helm.sh/docs/intro/quickstart/) för att installera och sätta upp Helm.



##### Nginx Ingress {#nginx-ingress}
<!-- https://kubernetes.github.io/ingress-nginx/deploy/#using-helm -->
<!-- https://github.com/terraform-aws-modules/terraform-aws-eks/issues/183 -->

Nginx Ingress kommer skapa en load balancer på AWS som kommer hantera alla request och skicka vidare till vårt kluster. Av någon anledning klarar inte Nginx Ingress av att göra det om vi inte redan har skapat en load balancer manuellt en gång så det måste ni göra först.

[YOUTUBE src="XdxvU6od4FQ" caption="Hur ni snabbt kan skapa en load balancer och sen ta bort den."]

Använd sen Helm för att installera Nginx ingress.

```
helm install nginx stable/nginx-ingress --set rbac.create=true

kubectl get svc
NAME                                  TYPE           CLUSTER-IP       EXTERNAL-IP                                                               PORT(S)                      AGE
kubernetes                            ClusterIP      100.64.0.1       <none>                                                                    443/TCP                      19h
microblog                             ClusterIP      100.68.59.26     <none>                                                                    5000/TCP                     13h
mysql                                 ClusterIP      None             <none>                                                                    3306/TCP                     18h
nginx-nginx-ingress-controller        LoadBalancer   100.68.72.140    a352bf19581e765dfb2653f6-1513732504.us-east-1.elb.amazonaws.com   80:31752/TCP,443:32396/TCP   121m
nginx-nginx-ingress-default-backend   ClusterIP      100.66.156.110   <none>                                                                    80/TCP                       121m
```

Kopiera EXTERNAL-IP för `nginx-nginx-ingress-controller`, det kan ta någon minut innan den kommer upp. Nu borde det ha skapats en Load Balancer i AWS under EC2.

Nu ska ni koppla IPn till en subdomän till er kluster domän ni redan har. Gå till Route 53 och er hosted zone för domänen ni använder för klustret. Skapa ett nytt record och döp den till valfritt, jag har `microblog.k8s.<domain>`. Välj Type `CNAME` och klistra in EXTERNAL-IP för nginx-ingress-controller.



##### Microblog deployment {#microblog-deployment}

För att koppla microblogen till ingress behöver ni troligen ändra er deployment. Jag visar bara upp de delar som används för denna delen.

```
apiVersion: v1
kind: Service
metadata:
  name: microblog
  labels:
    app: microblog
spec:
  selector:
    app: microblog
  ports:
    - port: 5000
      protocol: TCP
---
apiVersion: apps/v1
kind: Deployment
metadata:
  name: microblog
  labels:
  app: microblog
  ...
spec:
  ...
  template:
    metadata:
      labels:
        app: microblog
    ...
    spec:
      containers:
      - image: <dockerhub-användare>/<microblog-image>:no-statsd
        ports:
        - containerPort: 5000
          name: microblog
        livenessProbe:
          httpGet:
            path: /
            port: 5000
        ...
```

Jag la till en `livenessProbe`, den används av K8s för att kolla så containern är redo att användas. K8s kommer pinga `/` och kolla vad den får tillbaka för status kod, alla mellan 200 och 399 så tolkas det som att containern mår bra och kan användas. Notera också att jag inte har någon `type` på min Service.

```
kubectl apply -f microblog-deployment.yml
```

Skapa filen `ingress.yml` och lägg till en ingress i den. Vi ska använda ingressen till att göra vår microblog service tillgänglig publikt.

```
apiVersion: extensions/v1beta1
kind: Ingress
metadata:
  name: "microblog-ingress"
  annotations:
    kubernetes.io/ingress.class: "nginx"
    # cert-manager.io/cluster-issuer: "letsencrypt-staging"
spec:
  tls:
  - hosts:
    - microblog.k8s.<domain> # CHANGE ME!
    secretName: microblog-tls
  rules:
  - host: microblog.k8s.<domain> # CHANGE ME!
    http:
      paths:
      - path: /
        backend:
          serviceName: microblog
          servicePort: 5000
```

Aktivera filen också.

```
kubectl apply -f ingress.yml

kubectl get ingress -w
NAME                HOSTS                    ADDRESS          PORTS     AGE
microblog-ingress   microblog.k8s.<domain>   18.232.102.148   80, 443   91m
```

Gör `ctrl+c` när den fått en adress. Notera att `ADDRESS` inte behöver vara samma som EXTERNAL-IP för nginx-ingress-controller. Testa gå till domänen i er webbläsare, använd http och inte https.



##### Cert manager {#cert-manager}
<!-- https://cert-manager.io/docs/installation/kubernetes/#installing-with-helm -->

Vi använder Helm för att sätta upp Cert managern också. Men först installerar vi en `CustomResourceDefinition` och skapar ett namespace.

```
kubectl apply --validate=false -f https://raw.githubusercontent.com/jetstack/cert-manager/release-0.12/deploy/manifests/00-crds.yaml

kubectl create namespace cert-manager

helm repo add jetstack https://charts.jetstack.io

helm repo update

helm install   cert-manager   --namespace cert-manager   --version v0.12.0   jetstack/cert-manager

kubectl get pods --namespace cert-manager -w
NAME                                       READY   STATUS    RESTARTS   AGE
cert-manager-5b54dc9c97-wrj8w              1/1     Running   0          149m
cert-manager-cainjector-84565c968b-797x4   1/1     Running   0          149m
cert-manager-webhook-d9d886b4c-rjql5       1/1     Running   0          149m
```

Vänta på att alla pods är ready.



##### Let's Encrypt Issuer {#issuer}

Nästa steg är att sätta upp en [Issuer](https://cert-manager.io/docs/concepts/issuer), det är den som genererar certifikaten. Det finns två typer av issuers, Issuer och ClusterIssuer. En Issuer är begränsad till ett namespace, medans en CluserIssuer kan jobba i alla namespace. Vi använder ClusterIssuer för att det är lättare.

Vi kommer sätta upp två issuers då Let's Encrypt har en begränsning på antalet gånger man får [fråga efter nya certifikat](https://letsencrypt.org/docs/rate-limits/) till produktion. Det blir lätt fel i början så då testar vi först med en staging issuer.

Skapa `issuer-staging.yml` och `issuer-prod.yml`. Lägg till respektive konfiguration i rätt fil.

Staging:
```
apiVersion: cert-manager.io/v1alpha2
kind: ClusterIssuer
metadata:
  name: letsencrypt-staging
spec:
  acme:
    # The ACME server URL
    server: https://acme-staging-v02.api.letsencrypt.org/directory
    # Email address used for ACME registration
    email: <email>
    # Name of a secret used to store the ACME account private key
    privateKeySecretRef:
      name: letsencrypt-staging
    # Enable the HTTP-01 challenge provider
    solvers:
    - http01:
        ingress:
          class:  nginx
```

prod:
```
apiVersion: cert-manager.io/v1alpha2
kind: ClusterIssuer
metadata:
  name: letsencrypt-prod
spec:
  acme:
    # The ACME server URL
    server: https://acme-v02.api.letsencrypt.org/directory
    # Email address used for ACME registration
    email: <email>
    # Name of a secret used to store the ACME account private key
    privateKeySecretRef:
      name: letsencrypt-prod
    # Enable the HTTP-01 challenge provider
    solvers:
    - http01:
        ingress:
          class: nginx
```
Aktivera dem.

```
kubectl apply -f issuer-staging.yml
kubectl apply -f issuer-prod.yml
```

Vi använder [HTTP01](https://cert-manager.io/docs/configuration/acme/http01/) challenge providers för att få certifikaten, det finns också [DNS01](https://cert-manager.io/docs/configuration/acme/dns01/).

Kolla status på er Issuers.

```
kubectl describe clusterissuer letsencrypt-staging

Name:         letsencrypt-staging
Namespace:    default
Labels:       <none>
Annotations:  kubectl.kubernetes.io/last-applied-configuration:
                {"apiVersion":"cert-manager.io/v1alpha2","kind":"Issuer","metadata":{"annotations":{},"name":"letsencrypt-staging","namespace":"default"},...
API Version:  cert-manager.io/v1alpha2
Kind:         ClusterIssuer
Metadata:
  Creation Timestamp:  2019-12-09T10:35:29Z
  Generation:          1
  Resource Version:    154508
  Self Link:           /apis/cert-manager.io/v1alpha2/namespaces/default/issuers/letsencrypt-staging
  UID:                 63ccde08-248e-4760-8000-27d3fdfc041e
Spec:
  Acme:
    Email:  andreas_a@outlook.com
    Private Key Secret Ref:
      Name:  letsencrypt-staging
    Server:  https://acme-staging-v02.api.letsencrypt.org/directory
    Solvers:
      http01:
        Ingress:
          Class:  nginx
Status:
  Acme: 
    Last Registered Email:  <email>
    Uri:                    https://acme-staging-v02.api.letsencrypt.org/acme/acct/11750774
  Conditions:
    Last Transition Time:  2019-12-09T10:35:30Z
    Message:               The ACME account was registered with the ACME server
    Reason:                ACMEAccountRegistered
    Status:                True
    Type:                  Ready
Events:                    <none>
```



##### Aktivera HTTPS (TLS) {#activate_tls} 

Nu borde vi ha grunden för att få igång HTTPS för klustret. Uppdatera `ingress.yml`.

```
apiVersion: extensions/v1beta1
kind: Ingress
metadata:
  name: "microblog-ingress"
  annotations:
    kubernetes.io/ingress.class: "nginx"
    cert-manager.io/cluster-issuer: "letsencrypt-staging"
...
```

Aktivera den och vänta på ett certifikat.

```
kubectl apply -f ingress.yml

kubectl get certificate
NAME            READY   SECRET          AGE
microblog-tls   True    microblog-tls   127m

kubectl describe certificate microblog-tls
Name:         microblog-tls
Namespace:    default
Labels:       <none>
Annotations:  <none>
API Version:  cert-manager.io/v1alpha2
Kind:         Certificate
Metadata:
  Creation Timestamp:  2019-12-09T11:10:07Z
  Generation:          1
  Owner References:
    API Version:           extensions/v1beta1
    Block Owner Deletion:  true
    Controller:            true
    Kind:                  Ingress
    Name:                  microblog-ingress
    UID:                   6bb9e8c3-53fe-4ae9-9703-b7bd49990979
  Resource Version:        162305
  Self Link:               /apis/cert-manager.io/v1alpha2/namespaces/default/certificates/microblog-tls
  UID:                     3c9e2d8e-b193-4484-a23c-062b7e3f02fd
Spec:
  Dns Names:
    microblog.k8s.<domain>
  Issuer Ref:
    Group:      cert-manager.io
    Kind:       ClusterIssuer
    Name:       letsencrypt-staging
  Secret Name:  microblog-tls
Status:
  Conditions:
    Last Transition Time:  2019-12-09T11:10:07Z
    Message:               Certificate is up to date and has not expired
    Reason:                Ready
    Status:                True
    Type:                  Ready
  Not After:               2020-03-08T09:49:26Z
Events:                    <none>

kubectl describe secret microblog-tls
Name:         microblog-tls
Namespace:    default
Labels:       <none>
Annotations:  cert-manager.io/alt-names: microblog.k8s.arnesson.dev
              cert-manager.io/certificate-name: microblog-tls
              cert-manager.io/common-name: microblog.k8s.arnesson.dev
              cert-manager.io/ip-sans:
              cert-manager.io/issuer-kind: ClusterIssuer
              cert-manager.io/issuer-name: letsencrypt-staging
              cert-manager.io/uri-sans:

Type:  kubernetes.io/tls

Data
====
ca.crt:   0 bytes
tls.crt:  3566 bytes
tls.key:  1675 bytes
```

Det kan ta någon minut innan den blir redo. Om det tar med än 3-5 min kan ni kolla loggarna för cert-managern och kolla om något är fel.

```
kubectl get po -n cert-manager
NAME                                       READY   STATUS    RESTARTS   AGE
cert-manager-5b54dc9c97-wrj8w              1/1     Running   0          179m
cert-manager-cainjector-84565c968b-797x4   1/1     Running   0          179m
cert-manager-webhook-d9d886b4c-rjql5       1/1     Running   0          179m

kubectl logs cert-manager-5b54dc9c97-wrj8w -n cert-manager
```

Om allt ser rätt ut är ni redo att köra produktions issuer. Uppdatera `ingress.yml`.

```
apiVersion: extensions/v1beta1
kind: Ingress
metadata:
  name: "microblog-ingress"
  annotations:
    kubernetes.io/ingress.class: "nginx"
    cert-manager.io/cluster-issuer: "letsencrypt-prod"
...
```

Aktivera den och radera microblog-tls secret, då skapas en ny med certifikat från prod istället för staging.

```
kubectl apply -f ingress.yml

kubectl delete secret microblog-tls

kubectl describe certificate
Name:         microblog-tls
Namespace:    default
Labels:       <none>
Annotations:  <none>
API Version:  cert-manager.io/v1alpha2
Kind:         Certificate
Metadata:
  Creation Timestamp:  2019-12-09T11:10:07Z
  Generation:          1
  Owner References:
    API Version:           extensions/v1beta1
    Block Owner Deletion:  true
    Controller:            true
    Kind:                  Ingress
    Name:                  microblog-ingress
    UID:                   6bb9e8c3-53fe-4ae9-9703-b7bd49990979
  Resource Version:        162305
  Self Link:               /apis/cert-manager.io/v1alpha2/namespaces/default/certificates/microblog-tls
  UID:                     3c9e2d8e-b193-4484-a23c-062b7e3f02fd
Spec:
  Dns Names:
    t.k8s.arnesson.dev
  Issuer Ref:
    Group:      cert-manager.io
    Kind:       ClusterIssuer
    Name:       letsencrypt-prod
  Secret Name:  microblog-tls
Status:
  Conditions:
    Last Transition Time:  2019-12-09T11:10:07Z
    Message:               Certificate is up to date and has not expired
    Reason:                Ready
    Status:                True
    Type:                  Ready
  Not After:               2020-03-08T09:49:26Z
Events:                    <none>
```

Om det tar tid kan ni kolla om `kubectl describe order` och `kubectl describe challenge` finns och om de har någon info.

När certifikatet är True och Ready så ska ni kunna gå till `https://microblog.k8s.<domain>` och komma åt er Microblog.

Det här var ett av många sätt att få till HTTPS i Kubernetes. Om ni jobbar med Kubernetes något i framtiden kan det vara intressant att kolla upp wildcard certifikat. Vi har bara en endpoint (microlog) i vårt system och då behöver vi inte det. Men om man hade haft ett större system med flera endpoints så hade man velat använda wildcard.