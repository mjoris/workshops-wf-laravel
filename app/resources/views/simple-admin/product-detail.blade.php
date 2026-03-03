<x-simple-admin.layout :title="'Webshop administration'">
    <div class="col-sm-12">

        <div class="panel panel-default">
            <div class="panel-heading">
               Details of product {{ $product->id }}
            </div>
            <div class="panel-body">
                <p>
                    Name: {{ $product->name }}
                </p>
                <p>
                    Brand: {{ $product->brand->name }}
                </p>
            </div>
        </div>

    </div>
</x-simple-admin.layout>
